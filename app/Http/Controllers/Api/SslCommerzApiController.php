<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\Cart;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Models\OrderInstallment;
use App\Http\Controllers\Controller;
use App\Library\SslCommerz\SslCommerzNotification;

class SslCommerzApiController extends Controller
{
    public function index(Request $request) {
        
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
        $post_data['cus_phone']    = $request->customer_mobile;
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

        $order = new Order();
        foreach ($cartDatas as $cartData) {
            if (Order::where('user_id', auth()->user()->id)->where('course_id', $cartData->course->id)->exists()) {
                return response([
                    "warning" => "All ready Enroll This Course!",
                ]);
            }

            $order = Order::create([
                "user_id"       => auth()->user()->id,
                "course_id"     => $cartData->course->id,
                "price"         => $cartData->course->course_fee,
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
        return response([
            "success" => "Order Completed! Now Pay",
        ]);
        
    }

    public function success(Request $request) {

        $tran_id = $request->input('tran_id');

        OrderInstallment::where('transaction_id', $tran_id)->update([
            'status' => 2,
        ]);

        return response([
            "success" => "Transaction is successfully Completed!",
        ]);
    }

    public function fail(Request $request) {
        $tran_id = $request->input('tran_id');

        $order_detials = OrderInstallment::where('transaction_id', $tran_id)
            ->select('transaction_id', 'status','bdt')->first();

        if (1 == $order_detials->status) {
            $order_detials->update(['status' => 1]);
            return response([
                "error" => "Transaction is Falied!",
            ]);
            
        } else if ($order_detials->status == 2) {
            return response([
                "error" => "Transaction is already Successful!",
            ]);
        } else {
            return response([
                "error" => "Invalid Transaction!",
            ]);
        }

    }

    public function cancel(Request $request) {
        $tran_id = $request->input('tran_id');

        $order_detials = OrderInstallment::where('transaction_id', $tran_id)
            ->select('transaction_id', 'status','bdt')->first();

        if (1 == $order_detials->status) {
            $order_detials->update(['status' => 1]);
            return response([
                "error" => "Transaction is cancel!",
            ]);
        } else if ($order_detials->status == 2) {
            
            return response([
                "info" => "Transaction is already Successful!",
            ]);
        } else {
            return response([
                "info" => "Invalid Transaction!",
            ]);
        }

    }

    public function ipn(Request $request) {
        #Received all the payement information from the gateway
        if ($request->input('tran_id')) {

            $tran_id = $request->input('tran_id');

            #Check order status in order tabel against the transaction id or order id.
            $order_details = OrderInstallment::where('transaction_id', $tran_id)
                ->select('transaction_id', 'status', 'bdt')->first();

            if (1 == $order_details->status) {
                $sslc       = new SslCommerzNotification();
                $validation = $sslc->orderValidate($request->all(), $tran_id, $order_details->bdt);
                if ($validation == TRUE) {
                    
                    $update_product = OrderInstallment::where('transaction_id', $tran_id)
                        ->update(['status' => 2]);
                    return response([
                        "success" => "Transaction is successfully Completed!",
                    ]);
                    
                } else {
                   
                    $update_product = OrderInstallment::where('transaction_id', $tran_id)
                        ->update(['status' => 1]);

                    return response([
                        "error" => "Transaction is Fail!",
                    ]);
                }

            } else if ($order_details->status == 2) {

                return response([
                    "info" => "Transaction is already successfully Completed!",
                ]);
            } else {
                return response([
                    "error" => "Invalid Transaction!",
                ]);
            }
        } else {
            return response([
                "error" => "Invalid Data!",
            ]);
        }
    }
}
