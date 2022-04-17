<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Order;

class OrderController extends Controller {

    function index() {
        $orders = Order::with(['user' => function ($q) {
            $q->with('student');
        }, 'course'], )->get();
        return view('backend.order.index', compact('orders'));
    }
}
