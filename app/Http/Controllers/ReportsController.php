<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Lead;
use App\LeadsList;
use App\Order;

class ReportsController extends Controller
{

    public function orders(){
        $data['orders'] = Order::where('seller_id', auth()->user()->id)->get();

        $myPl = 0;
        $myLeads = 0;
        $myLists = LeadsList::where('user_id', auth()->user()->id)->get();
        foreach ($myLists as $key) {
            $myPl += Lead::where('leads_list_id', $key['id'])->where('status', 'pending')->count();
            $myLeads += Lead::where('leads_list_id', $key['id'])->count();
        }
        $data['tl_leads'] = $myLeads;
        $data['tl_pending'] = $myPl;

        $data['tl_delivered'] = Order::where('status', 'delivered')->where('seller_id', auth()->user()->id)->count();
        $data['tl_cancelled'] = Order::where('status', 'cancelled')->where('seller_id', auth()->user()->id)->count();
        $data['tl_ofd'] = Order::where('status', 'out for delivery')->where('seller_id', auth()->user()->id)->count();
        $data['tl_confirmed'] = Order::where('status', 'confirmed')->where('seller_id', auth()->user()->id)->count();
        $data['tl_cod'] = Order::where('seller_id', auth()->user()->id)->sum('cod_amount');

        return view('user.reports.orders', compact('data'));
    }

    public function cod(){
        $data['tl_cod'] = Order::where('seller_id', auth()->user()->id)->sum('cod_amount');

        $myPl = 0;
        $myLeads = 0;
        $myLists = LeadsList::where('user_id', auth()->user()->id)->get();
        foreach ($myLists as $key) {
            $myPl += Lead::where('leads_list_id', $key['id'])->where('status', 'pending')->sum('cod_amount');
        }
        $data['tl_pending'] = $myPl;

        $data['tl_delivered'] = Order::where('status', 'delivered')->where('seller_id', auth()->user()->id)->sum('cod_amount');
        $data['tl_cancelled'] = Order::where('status', 'cancelled')->where('seller_id', auth()->user()->id)->sum('cod_amount');
        $data['tl_ofd'] = Order::where('status', 'out for delivery')->where('seller_id', auth()->user()->id)->sum('cod_amount');
        $data['tl_confirmed'] = Order::where('status', 'confirmed')->where('seller_id', auth()->user()->id)->sum('cod_amount');

        return view('user.reports.cod', compact('data'));
    }
}