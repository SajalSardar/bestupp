<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller {

    function index() {

        $cartDatas = Cart::where('user_id', auth()->user()->id)->with(['course' => function ($q) {
            $q->select('id', 'name', 'slug', 'course_fee', 'discount', 'banner_image', )->with('installments');
        }])->get();

        $new = [];
        // foreach ($cartDatas as $co) {
        //     array_push($new, $co->course->installments->pluck('bdt')[0]);
        // };
        foreach ($cartDatas as $cartData) {
            foreach ($cartData->course->installments as $installment) {
                if ($installment->pay_date == 1 && $installment->status == 1) {
                    $new[] = $installment->bdt;
                }
            }
        }

        $installmentSum = array_sum($new);

        //return CartResource::collection($cartDatas);

        return response([
            'carts'    => $cartDatas,
            'payTotal' => $installmentSum,
        ]);
    }

    function enroll(Request $request) {
        $this->validate($request, [
            'course_id'   => 'required',
        ]);
        $cartDatas = Cart::where('user_id', auth()->user()->id)->get();

        foreach (auth()->user()->roles as $role) {
            if ($role->name == 'super-admin' || $role->name == 'admin' || $role->name == 'teacher') {
                return response([
                    'warning' => "You do not enroll this course. Because you are not a student!",
                ]);
            }
        }

        foreach ($cartDatas as $data) {
            if ($data->course_id == $request->course_id) {
                return response([
                    "message" => "Already Added Cart!",
                ]);
            }
        }

        $data                = new Cart();
        $data->user_id       = auth()->user()->id;
        $data->course_id     = $request->course_id;
        // $data->selected_day  = $request->studentDay;
        // $data->selected_time = $request->studenttime;
        $data->save();
        return response($data, 200);
    }

    function cartDelete($id) {
        $dataDelete = Cart::where('id', $id)->first();
        $dataDelete->delete();
        return response([
            'success' => "Delete Product to Cart!",
        ]);
    }

}
