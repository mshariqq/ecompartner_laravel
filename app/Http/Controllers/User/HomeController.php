<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Lead;
use App\LeadsList;
use App\Order;
use App\Product;
use App\User;
use App\Warehouse;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $data = [];

        $data['total_revenue'] = Order::where('seller_id', auth()->user()->id)->where('status', 'delivered')->sum('cod_amount');
        // total leads cod who are pending
        // $data['total_pending_cod'] = Lead::where('status', 'pending')->sum('cod_amount');
        $data['total_confirmed_cod'] = Order::where('seller_id', auth()->user()->id)->where('status', 'confirmed')->sum('cod_amount');
        $data['total_ofd_cod'] = Order::where('seller_id', auth()->user()->id)->where('status', 'out for delivery')->sum('cod_amount');
        $data['total_cancelled_cod'] = Order::where('seller_id', auth()->user()->id)->where('status', 'cancelled')->sum('cod_amount');
        $data['total_delivered_cod'] = Order::where('seller_id', auth()->user()->id)->where('status', 'delivered')->sum('cod_amount');
        $data['total_packing_cod'] = Order::where('seller_id', auth()->user()->id)->where('status', 'packing')->sum('cod_amount');

        $data['total_income'] = Order::where('seller_id', auth()->user()->id)->sum('cod_amount');

        // blue box
        $myLeads = 0;
        $myLists = LeadsList::where('user_id', auth()->user()->id)->get();
        foreach ($myLists as $key) {
            $myLeads += Lead::where('leads_list_id', $key['id'])->count();
        }
        $data['total_leads'] = $myLeads;

        // today total_orders

        $data['total_orders'] = Order::where('created_at', '>=', Carbon::today())->where('seller_id', auth()->user()->id)->count();
        $data['total_delivered_orders'] = Order::where('seller_id', auth()->user()->id)->where('status', 'delivered')->count();
        $data['total_outfordelivery_orders'] = Order::where('seller_id', auth()->user()->id)->where('status', 'out for delivery')->count();
        $data['total_packing_orders'] = Order::where('seller_id', auth()->user()->id)->where('status', 'packing')->count();
        $data['total_cancelled_orders'] = Order::where('seller_id', auth()->user()->id)->where('status', 'cancelled')->count();
        $data['total_confirmed_orders'] = Order::where('seller_id', auth()->user()->id)->where('status', 'confirmed')->count();

        $data['yesterday_orders'] = Order::where('seller_id', auth()->user()->id)->where('created_at','>=',Carbon::now()->subdays(1))->where('status', 'delivered')->sum('cod_amount');
        $data['last_week_orders'] = Order::where('seller_id', auth()->user()->id)->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('status', 'delivered')->sum('cod_amount');
        $data['last_month_orders'] = Order::where('seller_id', auth()->user()->id)->where('created_at','>=',Carbon::now()->subdays(30))->where('status', 'delivered')->sum('cod_amount');
        $data['last_sixmonths_orders'] = Order::where('seller_id', auth()->user()->id)->where('created_at','>=',Carbon::now()->subdays(182))->where('status', 'delivered')->sum('cod_amount');
        $data['last_year_orders'] = Order::where('seller_id', auth()->user()->id)->where('created_at','>=',Carbon::now()->subdays(365))->where('status', 'delivered')->sum('cod_amount');

        $data['LvsO'] = [];
        $data['LvsO']['7_dates'] = array(0, 1, 2, 3, 4, 5, 6);
        $data['LvsO']['leads'] = [];
        $data['LvsO']['orders'] = [];
        $data['LvsO']['dates'] = [];
        foreach ($data['LvsO']['7_dates'] as $key => $value) {
            $d1 = date('Y-m-d', strtotime('-'.$value.' days'));
            $val = $value - 1;
            $d2 = date('Y-m-d', strtotime('-'.$val.' days'));

            if($value == 0){
                $data['LvsO']['dates'][] = 'Today';

            }else{
                $data['LvsO']['dates'][] = Carbon::now()->subdays($value)->diffForHumans();

            }

            // $data['LvsO']['dates'][] = Carbon::now()->subdays($value)->diffForHumans();
            $myleads_count_from_lists = 0;
            foreach ($myLists as $key) {
                $myleads_count_from_lists += Lead::where('leads_list_id', $key['id'])->whereBetween('created_at', [$d1, $d2])->count();
            }
            $data['LvsO']['leads'][] = $myleads_count_from_lists;
            $data['LvsO']['orders'][] = Order::where('seller_id', auth()->user()->id)->whereBetween('created_at', [$d1, $d2])->count();

        }

        // my warehouses
        $myWarehouses = Warehouse::where('seller_id', auth()->user()->id)->get();
        $data['total_warehouses'] = count($myWarehouses);
        // my products
        $data['total_products'] = 0;
        foreach ($myWarehouses as $key) {
            $data['total_products'] += Product::where('warehouse_id', $key['id'])->count();
        }

        return view('user.home', compact('data'));
    }

    public function todayFilter(Request $request){
        $date = $request->date;
        $fromDate = $date . " 00:00:00";        
        
        $your_date = strtotime("1 day", strtotime($date));
        $toDate = date("Y-m-d h:s:m", $your_date);

        if(isset($request->date)){
            $data= [];
            //  leads
            // $data['leads'] = Lead::whereBetween('created_at', [$fromDate, $toDate])->where()->count();
            $myLists = LeadsList::where('user_id', auth()->user()->id)->get();
            $myLcount = 0;
            foreach ($myLists as $key) {
                $myLcount += Lead::where('leads_list_id', $key['id'])->whereBetween('created_at', [$fromDate, $toDate])->count();
            }
            $data['leads'] = $myLcount;

            //  confirmed
            $data['confirmed'] = Order::whereBetween('created_at', [$fromDate, $toDate])->where('status', 'confirmed')->where('seller_id', auth()->user()->id)->count();
            // delivered
            $data['delivered'] = Order::whereBetween('created_at', [$fromDate, $toDate])->where('status', 'delivered')->where('seller_id', auth()->user()->id)->count();
            // pending
            // $myLists = LeadsList::where('user_id', auth()->user()->id)->get();
            // $myPl = 0;
            // foreach ($myLists as $key) {
            //     $myPl += Lead::where('leads_list_id', $key['id'])->where('status', 'pending')->whereBetween('created_at', [$fromDate, $toDate])->count();
            // }
            // $data['pending'] = $myPl;
            $data['pending'] = Order::whereBetween('created_at', [$fromDate, $toDate])->where('status', 'out for delivery')->where('seller_id', auth()->user()->id)->count();
            $data['packing'] = Order::whereBetween('created_at', [$fromDate, $toDate])->where('status', 'packing')->where('seller_id', auth()->user()->id)->count();
            $data['cancelled'] = Order::whereBetween('created_at', [$fromDate, $toDate])->where('status', 'cancelled')->where('seller_id', auth()->user()->id)->count();

            // $data['pending'] = Lead::whereBetween('created_at', [$fromDate, $toDate])->where('status', 'pending')->where('seller_id', auth()->user()->id)->count();
            return response()->json(array('code' => 200, 'data' => $data));
        }else{
            return response()->json(array('code' => 401, "data" => "date missing"));
        }
    }

    public function DashAJaxDataFetch(Request $request){
        $isLeads = false;

        if($request->condition == 'Total Orders'){
            // means lead
            $isLeads = false;
            if(isset($request->date)){
                // if date given, filter leads on date of the seller
                $date = $request->date;
                $fromDate = $date . " 00:00:00"; 
                $your_date = strtotime("1 day", strtotime($date));
                $toDate = date("Y-m-d h:s:m", $your_date);

                // $myLists = LeadsList::where('user_id', auth()->user()->id)->get();
                // $myLeads = [];
                // foreach ($myLists as $key) {
                //     $myLeads[] = Lead::where('leads_list_id', $key['id'])->whereBetween('created_at', [$fromDate, $toDate])->get();
                // }
                // $orders = $myLeads;
                $orders = Order::where('seller_id', auth()->user()->id)->whereBetween('created_at', [$fromDate, $toDate])->get();

            }else{
                // if date not given, all leads of the seller
                // $myLists = LeadsList::where('user_id', auth()->user()->id)->get();
                // $myLeads = [];
                // foreach ($myLists as $key) {
                //     $myLeads[] =  Lead::where('leads_list_id', $key['id'])->get();
                // }
                // $orders = $myLeads;
                $orders = Order::where('seller_id', auth()->user()->id)->get();

            }
        }
        else{
            if(isset($request->date)){
                $date = $request->date;
                $fromDate = $date . " 00:00:00"; 
                $your_date = strtotime("1 day", strtotime($date));
                $toDate = date("Y-m-d h:s:m", $your_date);

                $orders = Order::where('seller_id', auth()->user()->id)->whereBetween('created_at', [$fromDate, $toDate])->where('status', $request->condition)->get();
            }else{
                $orders = Order::where('seller_id', auth()->user()->id)->where('status', $request->condition)->get();
            }
            // $orders = Order::where('seller_id', auth()->user()->id)->where('status', $request->condition)->paginate(100);
        }

        return view('user.reports.cod_analysi_ajaxdata', compact('orders', 'isLeads'));
    }
}
