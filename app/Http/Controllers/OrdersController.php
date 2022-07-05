<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Lead;
use App\LeadsList;
use App\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{

    public function viewAll(){
        
        $orders = Order::where('seller_id', auth()->user()->id)->paginate(10);
        return view('user.orders.all', compact('orders'));

    }

    public function track(){
        $is_data = false;
        return view('user.orders.track', compact('is_data'));

    }

    public function trackOrder(Request $request){
        $orders = Order::where('tracking_id', $request->id)->first();
        $is_data = true;
        if($orders){
            return view('user.orders.track', compact('orders', 'is_data'))->with('success', 'Result Found');

        }else{
            return redirect()->route('orders.track')->with('error', 'No Order found with this Tracking ID');
        }
    }

}