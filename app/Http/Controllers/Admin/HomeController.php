<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Lead;
use App\Order;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $data = [];

        $data['total_revenue'] = Order::where('status', 'delivered')->sum('cod_amount');

        // total leads cod who are pending
        $data['total_pending_cod'] = Lead::where('status', 'pending')->sum('cod_amount');

        $data['total_confirmed'] = Order::where('status', 'confirmed')->sum('cod_amount');

        $data['total_income'] = Order::all()->sum('cod_amount');


        // blue box
        $data['total_leads'] = Lead::all()->count();
        $data['total_orders'] = Order::all()->count();
        $data['total_delivered_orders'] = Order::where('status', 'delivered')->count();
        $data['total_outfordeivery_orders'] = Order::where('status', 'out for delivery')->count();
        $data['total_pending_orders'] = Lead::where('status', 'pending')->count();
        $data['total_cancelled_orders'] = Order::where('status', 'cancelled')->count();
        $data['total_confirmed_orders'] = Order::where('status', 'confirmed')->count();
        
        $data['total_leads_count'] = Lead::all()->count();
        

        $data['yesterday_orders'] = Order::where('created_at','>=',Carbon::now()->subdays(1))->where('status', 'delivered')->sum('cod_amount');
        $data['last_week_orders'] = Order::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('status', 'delivered')->sum('cod_amount');
        $data['last_month_orders'] = Order::where('created_at','>=',Carbon::now()->subdays(30))->where('status', 'delivered')->sum('cod_amount');
        $data['last_sixmonths_orders'] = Order::where('created_at','>=',Carbon::now()->subdays(182))->where('status', 'delivered')->sum('cod_amount');
        $data['last_year_orders'] = Order::where('created_at','>=',Carbon::now()->subdays(365))->where('status', 'delivered')->sum('cod_amount');

        // dd(Carbon::now()->subdays(365));
        $data['LvsO'] = [];
        $data['LvsO']['7_dates'] = array(1, 2, 3, 4, 5, 6, 7);
        $data['LvsO']['leads'] = [];
        $data['LvsO']['orders'] = [];
        $data['LvsO']['dates'] = [];
        foreach ($data['LvsO']['7_dates'] as $key => $value) {
            $data['LvsO']['dates'][] = Carbon::now()->subdays($value)->diffForHumans();
            $data['LvsO']['leads'][] = Lead::where('created_at','>=',Carbon::now()->subdays($value))->count();
            $data['LvsO']['orders'][] = Order::where('created_at','>=',Carbon::now()->subdays($value))->count();

        }

        $data['total_sellers'] = User::all()->count();
        $data['total_leads'] = Lead::all()->count();

        return view('admin.home', compact('data'));
    }


}
