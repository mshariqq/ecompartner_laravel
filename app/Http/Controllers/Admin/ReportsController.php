<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Lead;
use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportsController extends Controller
{

    public function codAnalysis(){

        // cod totals
        $data['tl_pending'] = Lead::where('status', 'pending')->sum('cod_amount');
        $data['tl_delivered'] = Order::where('status', 'delivered')->sum('cod_amount');
        $data['tl_cancelled'] = Order::where('status', 'cancelled')->sum('cod_amount');
        $data['tl_ofd'] = Order::where('status', 'out for delivery')->sum('cod_amount');
        $data['tl_confirmed'] = Order::where('status', 'confirmed')->sum('cod_amount');
        $data['tl_cod'] = Order::all()->sum('cod_amount');

        $filter = false;

        // todays cod
        $data['td_pending'] = Lead::where('status', 'pending')->where('created_at', '>=', Carbon::today())->sum('cod_amount');
        $data['td_cancelled'] = Order::where('status', 'cancelled')->where('created_at', '>=', Carbon::today())->sum('cod_amount');
        $data['td_confirmed'] = Order::where('status', 'confirmed')->where('created_at', '>=', Carbon::today())->sum('cod_amount');
        $data['td_cod'] = Order::all()->where('created_at', '>=', Carbon::today())->sum('cod_amount');

        return view('admin.reports.cod_analysis', compact('data', 'filter'));
    }

    public function codAnalysisFilter(Request $request){
        // attach time to date
        $from = $request->from;
        $to = $request->to;
        $filter = true;
    
        // cod totals
        $data['tl_pending'] = Lead::whereBetween('created_at', [$from, $to])->where('status', 'pending')->sum('cod_amount');
        $data['tl_delivered'] = Order::whereBetween('created_at', [$from, $to])->where('status', 'delivered')->sum('cod_amount');
        $data['tl_cancelled'] = Order::whereBetween('created_at', [$from, $to])->where('status', 'cancelled')->sum('cod_amount');
        $data['tl_ofd'] = Order::whereBetween('created_at', [$from, $to])->where('status', 'out for delivery')->sum('cod_amount');
        $data['tl_confirmed'] = Order::whereBetween('created_at', [$from, $to])->where('status', 'confirmed')->sum('cod_amount');
        $data['tl_cod'] = Order::whereBetween('created_at', [$from, $to])->sum('cod_amount');

        // todays cod
        $data['td_pending'] = Lead::where('status', 'pending')->where('created_at', '>=', Carbon::today())->sum('cod_amount');
        $data['td_cancelled'] = Order::where('status', 'cancelled')->where('created_at', '>=', Carbon::today())->sum('cod_amount');
        $data['td_confirmed'] = Order::where('status', 'confirmed')->where('created_at', '>=', Carbon::today())->sum('cod_amount');
        $data['td_cod'] = Order::where('created_at', '>=', Carbon::today())->sum('cod_amount');

        return view('admin.reports.cod_analysis', compact('data', 'filter'));
    }

    public function codAnalysisAJaxDataFetch(Request $request){
        
        if($request->condition == 'total-cod'){
            $orders = Order::paginate(100);
        }
        else{
            $orders = Order::where('status', $request->condition)->paginate(100);
        }

        return view('admin.reports.cod_analysi_ajaxdata', compact('orders'));
    }
}