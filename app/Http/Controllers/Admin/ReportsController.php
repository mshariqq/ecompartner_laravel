<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Lead;
use App\Order;

class ReportsController extends Controller
{

    public function orders(){
        $data['orders'] = Order::where('seller_id', auth()->user()->id)->get();

        $data['tl_pending'] = Lead::where('status', 'pending')->count();
        $data['tl_leads'] = Lead::all()->count();

        $data['tl_delivered'] = Order::where('status', 'delivered')->count();
        $data['tl_cancelled'] = Order::where('status', 'cancelled')->count();
        $data['tl_ofd'] = Order::where('status', 'out for delivery')->count();
        $data['tl_confirmed'] = Order::where('status', 'confirmed')->count();
        $data['tl_cod'] = Order::where('seller_id', auth()->user()->id)->sum('cod_amount');

        return view('admin.reports.orders', compact('data'));
    }

    public function cod(){
        $data['tl_cod'] = Order::where('seller_id', auth()->user()->id)->sum('cod_amount');
        $data['tl_pending'] =  Lead::where('status', 'pending')->sum('cod_amount');;

        $data['tl_delivered'] = Order::where('status', 'delivered')->sum('cod_amount');
        $data['tl_cancelled'] = Order::where('status', 'cancelled')->sum('cod_amount');
        $data['tl_ofd'] = Order::where('status', 'out for delivery')->sum('cod_amount');
        $data['tl_confirmed'] = Order::where('status', 'confirmed')->sum('cod_amount');

        return view('admin.reports.cod', compact('data'));
    }
}