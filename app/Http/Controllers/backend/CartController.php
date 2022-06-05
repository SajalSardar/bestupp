<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\DaySchedule;
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

    function enroll(Request $request, $id) {
        $cartDatas = Cart::where('user_id', auth()->user()->id)->get();

        foreach (auth()->user()->roles as $role) {
            if ($role->name == 'super-admin' || $role->name == 'admin' || $role->name == 'teacher') {
                return back()->with('warning', "You do not enroll this course. Because you are not a student!");
            }
        }

        if(empty(auth()->user()->student->id)){
            return redirect(route('dashboard.student.information.edit'))->with('warning', "Set Your Student information!");
        }

        foreach ($cartDatas as $data) {
            if ($data->course_id == $id) {
                return redirect(route('frontend.cart'));
            }
        }
        $this->validate($request, [
            'studentDay'  => 'required',
            'studenttime' => 'required',
        ]);

        $data                = new Cart();
        $data->user_id       = auth()->user()->id;
        $data->course_id     = $id;
        $data->selected_day  = $request->studentDay;
        $data->selected_time = $request->studenttime;
        $data->save();
        return redirect(route('frontend.cart'));
    }

    function cartDelete($id) {
        $dataDelete = Cart::where('id', $id)->first();
        $dataDelete->delete();
        return back()->with('success', "Delete Product  Cart!");
    }

}
