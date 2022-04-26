<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller {

    function index() {
        $orders = Order::with(['user' => function ($q) {
            $q->with('student');
        }, 'course', 'OrderInstallments'], )->get();
        return view('backend.order.index', compact('orders'));
    }

    function manageOrder($id) {
        $orderManage = Order::find($id);
        return view('backend.order.view', compact('orderManage'));
    }

    function runningOrder($id) {
        $orderManage         = Order::find($id);
        $orderManage->status = 1;
        $orderManage->save();
        return back()->with('success', "Success!");
    }
    function dropOrder($id) {
        $orderManage         = Order::find($id);
        $orderManage->status = 2;
        $orderManage->save();
        return back()->with('success', "Success!");
    }
    function completeOrder($id) {
        $orderManage         = Order::find($id);
        $orderManage->status = 3;
        $orderManage->save();
        return back()->with('success', "Success!");
    }
}
