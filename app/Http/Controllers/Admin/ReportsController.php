<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Order;

class ReportsController extends Controller
{

    public function orders(){
        $orders = Order::all();
        return view('admin.reports.orders', compact('orders'));
    }
}