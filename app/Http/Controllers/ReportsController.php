<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Lead;
use App\LeadsList;
use App\Order;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ReportsController extends Controller
{

    public function codAnalysis(){

        // cod totals
        $mylists = LeadsList::where('user_id', auth()->user()->id)->get();
        $PendingCount = 0;
        foreach ($mylists as $key) {
            $PendingCount += Lead::where('status', 'pending')->where('leads_list_id', $key['id'])->sum('cod_amount');
        }
        $data['tl_pending'] = $PendingCount;
        $data['tl_delivered'] = Order::where('status', 'delivered')->where('seller_id', auth()->user()->id)->sum('cod_amount');
        $data['tl_cancelled'] = Order::where('status', 'cancelled')->where('seller_id', auth()->user()->id)->sum('cod_amount');
        $data['tl_ofd'] = Order::where('status', 'out for delivery')->where('seller_id', auth()->user()->id)->sum('cod_amount');
        $data['tl_confirmed'] = Order::where('status', 'confirmed')->where('seller_id', auth()->user()->id)->sum('cod_amount');
        $data['tl_cod'] = Order::where('seller_id', auth()->user()->id)->sum('cod_amount');

        $filter = false;

        // todays cod
         // cod totals
         $mylists = LeadsList::where('user_id', auth()->user()->id)->get();
         $PendingCount = 0;
         foreach ($mylists as $key) {
             $PendingCount += Lead::where('status', 'pending')->where('created_at', '>=', Carbon::today())->where('leads_list_id', $key['id'])->sum('cod_amount');
         }
        $data['td_pending'] = $PendingCount;
        $data['td_cancelled'] = Order::where('status', 'cancelled')->where('seller_id', auth()->user()->id)->where('created_at', '>=', Carbon::today())->sum('cod_amount');
        $data['td_confirmed'] = Order::where('status', 'confirmed')->where('seller_id', auth()->user()->id)->where('created_at', '>=', Carbon::today())->sum('cod_amount');
        $data['td_cod'] = Order::where('seller_id', auth()->user()->id)->where('created_at', '>=', Carbon::today())->sum('cod_amount');

        $data['dateTimeValidated'] = false;
        $data['from_date'] = 'null';
        $data['to_date'] = 'null';

        return view('user.reports.cod_analysis', compact('data', 'filter'));
    }

    public function codAnalysisFilter(Request $request){
        // attach time to date
        $from = $request->from;
        $to = $request->to;
        $filter = true;
    
        // cod totals
        $mylists = LeadsList::where('user_id', auth()->user()->id)->get();
        $PendingCount = 0;
        foreach ($mylists as $key) {
            $PendingCount += Lead::where('status', 'pending')->whereBetween('created_at', [$from, $to])->where('leads_list_id', $key['id'])->sum('cod_amount');
        }
        $data['tl_pending'] = $PendingCount;
        $data['tl_delivered'] = Order::whereBetween('created_at', [$from, $to])->where('seller_id', auth()->user()->id)->where('status', 'delivered')->sum('cod_amount');
        $data['tl_cancelled'] = Order::whereBetween('created_at', [$from, $to])->where('seller_id', auth()->user()->id)->where('status', 'cancelled')->sum('cod_amount');
        $data['tl_ofd'] = Order::whereBetween('created_at', [$from, $to])->where('seller_id', auth()->user()->id)->where('status', 'out for delivery')->sum('cod_amount');
        $data['tl_confirmed'] = Order::whereBetween('created_at', [$from, $to])->where('seller_id', auth()->user()->id)->where('status', 'confirmed')->sum('cod_amount');
        $data['tl_cod'] = Order::whereBetween('created_at', [$from, $to])->where('seller_id', auth()->user()->id)->sum('cod_amount');

        // todays cod
        $mylists = LeadsList::where('user_id', auth()->user()->id)->get();
        $PendingCount = 0;
        foreach ($mylists as $key) {
            $PendingCount += Lead::where('status', 'pending')->where('created_at', '>=', Carbon::today())->where('leads_list_id', $key['id'])->sum('cod_amount');
        }
       $data['td_pending'] = $PendingCount;        
       $data['td_cancelled'] = Order::where('status', 'cancelled')->where('seller_id', auth()->user()->id)->where('created_at', '>=', Carbon::today())->sum('cod_amount');
        $data['td_confirmed'] = Order::where('status', 'confirmed')->where('seller_id', auth()->user()->id)->where('created_at', '>=', Carbon::today())->sum('cod_amount');
        $data['td_cod'] = Order::where('created_at', '>=', Carbon::today())->where('seller_id', auth()->user()->id)->sum('cod_amount');
        
        $data['dateTimeValidated'] = true;
        $data['from_date'] = $request->from;
        $data['to_date'] = $request->to;

        return view('user.reports.cod_analysis', compact('data', 'filter'));
    }

    public function codAnalysisAJaxDataFetch(Request $request){
        $isLeads = false;
        if($request->is_date){
            // if date filter is on, then filter based on dates
            $from = $request->from_date .' 00:00:00';
            $to = $request->to_date . ' 23:59:59';

            if($request->condition == 'total-cod'){
                $orders = Order::where('seller_id', auth()->user()->id)->whereBetween('created_at', [$from, $to])->paginate(100);
            }
            else{
                $orders = Order::where('status', $request->condition)->whereBetween('created_at', [$from, $to])->where('seller_id', auth()->user()->id)->paginate(100);
            }
        }else{
            if($request->condition == 'total-cod'){
                $orders = Order::where('seller_id', auth()->user()->id)->paginate(100);
            }
            else{
                $orders = Order::where('status', $request->condition)->where('seller_id', auth()->user()->id)->paginate(100);
            }
        }
        return view('user.reports.cod_analysi_ajaxdata', compact('orders', 'isLeads'));
    }
}