<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Lead;
use App\LeadsList;
use App\Order;
use Illuminate\Http\Request;


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
    
    public function allOrders($where = false){
        if($where != false){
            $orders = Order::orderBy('id','DESC')->where('status', $where)->paginate(25);

        }else{
            $orders = Order::orderBy('id','DESC')->paginate(25);

        }
        return view('admin.orders.all-orders', compact('orders'));

    }

    public function exportOrders(Request $request){
        // get data from query
        $request->from = $request->from . " 00:00:00";
        $request->to = $request->to . " 00:00:00";
        if($request->status == 'all'){
            $orders = Order::whereBetween('created_at', [$request->from, $request->to])->get();
        }else{
            $orders = Order::whereBetween('created_at', [$request->from, $request->to])->where('status', $request->status)->get();
        }
        // arrange in table tr and echo
        if(count($orders) < 1){
            echo "empty";
        }else{
            $html = "";
            foreach ($orders as $item) {
                # arrange the html table tr
                $html .= "<tr>";
                    $html .= "<td>".$item->seller->name."</td>";
                    $html .= "<td>".$item->tracking_id."</td>";
                    $html .= "<td>".$item->status."</td>";
                    $html .= "<td>".$item->name."</td>";
                    $html .= "<td>".$item->delivery_address."</td>";
                    $html .= "<td>".$item->city."</td>";
                    $html .= "<td>".$item->phone_number."</td>";
                    $html .= "<td>".$item->country."</td>";
                    $html .= "<td>".$item->cod_currency."</td>";
                    $html .= "<td>".$item->cod_amount."</td>";
                    $html .= "<td>".$item->pieces."</td>";
                    $html .= "<td>".$item->shipment_description."</td>";
                $html .= "</tr>";
            }
            echo $html;
        }
        
    }

}