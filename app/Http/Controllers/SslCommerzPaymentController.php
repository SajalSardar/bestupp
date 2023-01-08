<?php

namespace App\Http\Controllers;

use App\Library\SslCommerz\SslCommerzNotification;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderInstallment;
use App\Notifications\InvoicePaid;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;

class SslCommerzPaymentController extends Controller {

    public function exampleHostedCheckout() {

        $cartDatas = Cart::where('user_id', auth()->user()->id)->with(['course' => function ($q) {
            $q->with('installments');
        }])->get();

        $pay_bdt = [];
        foreach ($cartDatas as $cartData) {
            foreach ($cartData->course->installments as $installment) {
                if ($installment->pay_date == 1 && $installment->status == 1) {
                    $pay_bdt[] = $installment->bdt;
                }
            }
        }

        $total_amount = array_sum($pay_bdt);

        return view('exampleHosted', compact('total_amount', 'cartDatas'));
    }

    public function index(Request $request) {
        $request->validate([
            'check' => "required",
        ]);

        $cartDatas = Cart::where('user_id', auth()->user()->id)->with(['course' => function ($q) {
            $q->with('installments');
        }])->get();

        $pay_bdt = [];
        foreach ($cartDatas as $cartData) {
            foreach ($cartData->course->installments as $installment) {
                if ($installment->pay_date == 1 && $installment->status == 1) {
                    $pay_bdt[] = $installment->bdt;
                }
            }
        }

        $total_amount = array_sum($pay_bdt);

        $post_data                 = array();
        $post_data['total_amount'] = $total_amount; # You cant not pay less than 10
        $post_data['currency']     = "BDT";
        $post_data['tran_id']      = uniqid(); // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name']     = auth()->user()->name;
        $post_data['cus_email']    = auth()->user()->email;
        $post_data['cus_add1']     = 'Customer Address';
        $post_data['cus_add2']     = "";
        $post_data['cus_city']     = "";
        $post_data['cus_state']    = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country']  = "Bangladesh";
        $post_data['cus_phone']    = auth()->user()->phone;
        $post_data['cus_fax']      = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name']     = "Store Test";
        $post_data['ship_add1']     = "Dhaka";
        $post_data['ship_add2']     = "Dhaka";
        $post_data['ship_city']     = "Dhaka";
        $post_data['ship_state']    = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone']    = "";
        $post_data['ship_country']  = "Bangladesh";

        $post_data['shipping_method']  = "NO";
        $post_data['product_name']     = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile']  = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";

        #Before  going to initiate the payment order status need to insert or update as Pending.

        $order = new Order();
        foreach ($cartDatas as $cartData) {
            if (Order::where('user_id', auth()->user()->id)->where('course_id', $cartData->course->id)->exists()) {
                return redirect(route('frontend.cart'))->with("warning", 'All ready Enroll This Course!');
            }

            $order = Order::create([
                "user_id"       => auth()->user()->id,
                "course_id"     => $cartData->course->id,
                "price"         => $cartData->course->discount ? ($cartData->course->course_fee) - ($cartData->course->discount): $cartData->course->course_fee,
                "selected_day"  => $cartData->selected_day,
                "selected_time" => $cartData->selected_time,
                "created_at"    => now(),
                "updated_at"    => now(),
            ]);

            foreach ($cartData->course->installments as $key => $installments) {
                $orderinstallmentId = OrderInstallment::create([
                    "order_id"    => $order->id,
                    "installment" => ++$key,
                    "bdt"         => $installments->bdt,
                    "paydate"     => Carbon::now()->addDays($installments->pay_date),
                    "created_at"  => now(),
                    "updated_at"  => now(),
                ]);

            }
            foreach ($order->OrderInstallments as $OrderInstallment) {
                if ($OrderInstallment->installment == 1 && $OrderInstallment->status == 1) {
                    $OrderInstallment->update([
                        'transaction_id' => $post_data['tran_id'],
                    ]);
                }
            }

            $cartData->delete();

        }

        $sslc = new SslCommerzNotification();
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }

    }

    public function success(Request $request) {

        $tran_id = $request->input('tran_id');
        $installmentQuery = OrderInstallment::where('transaction_id', $tran_id);

        $installmentQuery->update([
            'status' => 2,
        ]);
        $OrderInstallments = $installmentQuery->get();
        foreach($OrderInstallments as $OrderInstallment){
            $OrderInstallment->order->user->notify(new InvoicePaid($OrderInstallment));
        }

        return redirect(route('dashboard.student.order'))->with('course_buy', 'Congratulations, Payment Successfully Done. Continue This Course.');
    }

    public function fail(Request $request) {
        $tran_id = $request->input('tran_id');

        $order_detials = OrderInstallment::where('transaction_id', $tran_id)
            ->select('transaction_id', 'status','bdt')->first();

        if (1 == $order_detials->status) {
            $order_detials->update(['status' => 1]);
            return redirect(route('dashboard.student.order'))->with('error', 'Transaction is Falied');
        } else if ($order_detials->status == 2) {
            return redirect(route('dashboard.student.order'))->with('info', 'Transaction is already Successful');
        } else {
            return redirect(route('dashboard.student.order'))->with('error', 'Invalid Transaction');
        }

    }

    public function cancel(Request $request) {
        $tran_id = $request->input('tran_id');

        $order_detials = OrderInstallment::where('transaction_id', $tran_id)
            ->select('transaction_id', 'status','bdt')->first();

        if (1 == $order_detials->status) {
            $order_detials->update(['status' => 1]);
            return redirect(route('dashboard.student.order'))->with('error', 'Transaction is cancel');
        } else if ($order_detials->status == 2) {
            return redirect(route('dashboard.student.order'))->with('info', 'Transaction is already Successful');
        } else {
            return redirect(route('dashboard.student.order'))->with('error', 'Invalid Transaction');
        }

    }

    public function ipn(Request $request) {

        if ($request->input('tran_id')) {

            $tran_id = $request->input('tran_id');

            $order_details = OrderInstallment::where('transaction_id', $tran_id)
                ->select('transaction_id', 'status', 'bdt')->first();

            if (1 == $order_details->status) {
                $sslc       = new SslCommerzNotification();
                $validation = $sslc->orderValidate($request->all(), $tran_id, $order_details->bdt);
                if ($validation == TRUE) {
                    /*
                    That means IPN worked. Here you need to update order status
                    in order table as Processing or Complete.
                    Here you can also sent sms or email for successful transaction to customer
                     */
                    $update_product = OrderInstallment::where('transaction_id', $tran_id)
                        ->update(['status' => 2]);
                    return redirect(route('dashboard.student.order'))->with('success', 'Transaction is successfully Completed');
                } else {
                    /*
                    That means IPN worked, but Transation validation failed.
                    Here you need to update order status as Failed in order table.
                     */
                    $update_product = OrderInstallment::where('transaction_id', $tran_id)
                        ->update(['status' => 1]);

                    return redirect(route('dashboard.student.order'))->with('error', 'Transaction is Fail');
                }

            } else if ($order_details->status == 2) {

                return redirect(route('dashboard.student.order'))->with('info', 'Transaction is already successfully Completed');
            } else {
                #That means something wrong happened. You can redirect customer to your product page.
                return redirect(route('dashboard.student.order'))->with('error', 'Invalid Transaction');
            }
        } else {
            return redirect(route('dashboard.student.order'))->with('error', 'Invalid Data');
        }
    }

}
