<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Lead;
use App\LeadsList;
use App\Order;

class OrdersController extends Controller
{

    public function viewAll(){
        
        $orders = Order::where('seller_id', auth()->user()->id)->paginate(10);
        return view('user.orders.all', compact('orders'));

    }

}