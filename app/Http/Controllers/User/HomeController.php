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
        $data['total_pending_cod'] = Lead::where('status', 'pending')->sum('cod_amount');

        $data['total_confirmed'] = Order::where('seller_id', auth()->user()->id)->where('status', 'confirmed')->sum('cod_amount');

        $data['total_income'] = Order::where('seller_id', auth()->user()->id)->sum('cod_amount');


        // blue box
        $data['total_leads'] = 0;
        $myLists = LeadsList::where('user_id', auth()->user()->id)->get();
        foreach ($myLists as $key) {
            $data['total_leads'] += Lead::where('leads_list_id', $key['id'])->count();
        }
        $data['total_orders'] = Order::where('seller_id', auth()->user()->id)->count();
        $data['total_delivered_orders'] = Order::where('seller_id', auth()->user()->id)->where('status', 'delivered')->count();
        $data['total_outfordeivery_orders'] = Order::where('seller_id', auth()->user()->id)->where('status', 'out for delivery')->count();

        $data['total_pending_orders'] = 0;
        foreach ($myLists as $key) {
            $data['total_pending_orders'] = Lead::where('leads_list_id', $key['id'])->where('status', 'pending')->count();
        }

        $data['total_cancelled_orders'] = Order::where('seller_id', auth()->user()->id)->where('status', 'cancelled')->count();
        $data['total_confirmed_orders'] = Order::where('seller_id', auth()->user()->id)->where('status', 'confirmed')->count();
        
        $data['total_leads_count'] = Lead::all()->count();
        

        $data['yesterday_orders'] = Order::where('seller_id', auth()->user()->id)->where('created_at','>=',Carbon::now()->subdays(1))->where('status', 'delivered')->sum('cod_amount');
        $data['last_week_orders'] = Order::where('seller_id', auth()->user()->id)->whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('status', 'delivered')->sum('cod_amount');
        $data['last_month_orders'] = Order::where('seller_id', auth()->user()->id)->where('created_at','>=',Carbon::now()->subdays(30))->where('status', 'delivered')->sum('cod_amount');
        $data['last_sixmonths_orders'] = Order::where('seller_id', auth()->user()->id)->where('created_at','>=',Carbon::now()->subdays(182))->where('status', 'delivered')->sum('cod_amount');
        $data['last_year_orders'] = Order::where('seller_id', auth()->user()->id)->where('created_at','>=',Carbon::now()->subdays(365))->where('status', 'delivered')->sum('cod_amount');

        // dd(Carbon::now()->subdays(365));
        $data['LvsO'] = [];
        $data['LvsO']['7_dates'] = array(1, 2, 3, 4, 5, 6, 7);
        $data['LvsO']['leads'] = [];
        $data['LvsO']['orders'] = [];
        $data['LvsO']['dates'] = [];
        foreach ($data['LvsO']['7_dates'] as $key => $value) {
            $data['LvsO']['dates'][] = Carbon::now()->subdays($value)->diffForHumans();
            $myleads_count_from_lists = 0;
            foreach ($myLists as $key) {
                $myleads_count_from_lists += Lead::where('leads_list_id', $key['id'])->where('created_at','>=',Carbon::now()->subdays($value))->count();
            }
            $data['LvsO']['leads'][] = $myleads_count_from_lists;
            $data['LvsO']['orders'][] = Order::where('seller_id', auth()->user()->id)->where('created_at','>=',Carbon::now()->subdays($value))->count();

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
        $toDate = $date . " 23:59:59";
        $fromDate = $date . " 00:00:00";        
        
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
            $myLists = LeadsList::where('user_id', auth()->user()->id)->get();
            $myPl = 0;
            foreach ($myLists as $key) {
                $myPl += Lead::where('leads_list_id', $key['id'])->where('status', 'pending')->whereBetween('created_at', [$fromDate, $toDate])->count();
            }
            $data['pending'] = $myPl;
            // $data['pending'] = Lead::whereBetween('created_at', [$fromDate, $toDate])->where('status', 'pending')->where('seller_id', auth()->user()->id)->count();
            return response()->json(array('code' => 200, 'data' => $data));
        }else{
            return response()->json(array('code' => 401, "data" => "date missing"));
        }
    }
}
