<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\DaySchedule;
use App\Models\Order;
use App\Models\OrderInstallment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CartController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    function index() {
        $days      = DaySchedule::all();
        $cartDatas = Cart::where('user_id', auth()->user()->id)->with(['course' => function ($q) {
            $q->with('installments');
        }])->get();

        $new = [];
        foreach ($cartDatas as $co) {
            array_push($new, $co->course->installments->pluck('bdt')[0]);
        };
        $installmentSum = array_sum($new);

        return view('frontend.cart', compact('cartDatas', 'days', 'installmentSum'));
    }

    function enroll($id) {
        $cartDatas = Cart::where('user_id', auth()->user()->id)->get();
        foreach ($cartDatas as $data) {
            if ($data->course_id == $id) {
                return redirect(route('frontend.cart'));
            }
        }

        $data            = new Cart();
        $data->user_id   = auth()->user()->id;
        $data->course_id = $id;
        $data->save();
        return redirect(route('frontend.cart'));
    }

    function cartDelete($id) {
        $dataDelete = Cart::where('course_id', $id)->first();
        $dataDelete->delete();
        return back()->with('success', "Delete Product  Cart!");
    }

    function checkout(Request $request) {

        $cartDatas = Cart::where('user_id', auth()->user()->id)->with(['course' => function ($q) {
            $q->with('installments');
        }])->get();

        $this->validate($request, [
            'studentDay'  => 'required',
            'studenttime' => 'required',
        ]);

        $order = new Order();
        foreach ($cartDatas as $cartData) {
            if (Order::where('user_id', auth()->user()->id)->where('course_id', $cartData->course->id)->exists()) {
                return back()->with("warning", 'All ready Enroll This Course!');
            }

            $order = Order::create([
                "user_id"       => auth()->user()->id,
                "course_id"     => $cartData->course->id,
                "price"         => $cartData->course->course_fee,
                "selected_day"  => $request->studentDay,
                "selected_time" => $request->studenttime,
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
            $cartData->delete();

            // foreach ($order->OrderInstallments as $OrderInstallment) {
            //     if ($OrderInstallment->installment == 1) {
            //         return $OrderInstallment->bdt . " BDT 1st installment pay first!";
            //     }
            // }

        }
        return redirect(route('dashboard'))->with('success', "Successfully Buy This Course!");
    }
}
