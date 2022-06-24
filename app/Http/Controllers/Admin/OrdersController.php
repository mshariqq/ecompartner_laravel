<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Lead;
use App\LeadsList;
use App\Order;

class OrdersController extends Controller
{

    // admin can change the status
    public function changeOrderStatus($id, $status){
        $lead = Order::find($id);
        if($lead){
            $lead->status = $status;
            $update = $lead->save();
            if($update){
                return array(
                    'code' => 200,
                    'msg' => 'success'
                );
            }else{
                return array(
                    'code' => 500,
                    'msg' => 'error occured while updating the record'
                );
            }

        }else{
            return array(
                'code' => 401,
                'msg' => 'not found'
            );
        }
    }
    
    public function allOrders(){
        
        $orders = Order::orderBy('id','DESC')->paginate(10);
        return view('admin.orders.all-orders', compact('orders'));

    }

}