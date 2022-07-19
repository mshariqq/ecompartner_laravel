<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Order;
use Illuminate\Http\Request;

class OrdersController extends Controller
{

    public function viewAll($where = false){
        if($where != false){
            $orders = Order::where('seller_id', auth()->user()->id)->where('status', $where)->paginate(15);

        }else{
            $orders = Order::where('seller_id', auth()->user()->id)->paginate(15);

        }
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

    public function exportOrders(Request $request){
        // get data from query
        $request->from = $request->from . " 00:00:00";
        $request->to = $request->to . " 00:00:00";
        if($request->status == 'all'){
            $orders = Order::whereBetween('created_at', [$request->from, $request->to])->where('seller_id', auth()->user()->id)->get();
        }else{
            $orders = Order::whereBetween('created_at', [$request->from, $request->to])->where('seller_id', auth()->user()->id)->where('status', $request->status)->get();
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