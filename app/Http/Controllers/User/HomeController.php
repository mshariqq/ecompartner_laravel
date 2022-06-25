<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Lead;
use App\LeadsList;
use App\Order;
use App\User;
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

        $data['total_revenue'] = Order::where('status', 'delivered')->where('seller_id', auth()->user()->id)->sum('cod_amount');

        $data['total_cancelled'] = Order::where('status', 'cancelled')->where('seller_id', auth()->user()->id)->sum('cod_amount');

        $data['total_income'] = Order::where('seller_id', auth()->user()->id)->sum('cod_amount');

        $data['total_orders'] = Order::where('seller_id', auth()->user()->id)->count();

        $data['today_orders'] = Order::whereDate('created_at', Carbon::today())->where('status', 'delivered')->where('seller_id', auth()->user()->id)->sum('cod_amount');

        $data['yesterday_orders'] = Order::where('created_at','>=',Carbon::now()->subdays(1))->where('status', 'delivered')->where('seller_id', auth()->user()->id)->sum('cod_amount');
        $data['last_week_orders'] = Order::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->where('seller_id', auth()->user()->id)->where('status', 'delivered')->sum('cod_amount');
        $data['last_month_orders'] = Order::where('created_at','>=',Carbon::now()->subdays(30))->where('status', 'delivered')->where('seller_id', auth()->user()->id)->sum('cod_amount');
        $data['last_sixmonths_orders'] = Order::where('created_at','>=',Carbon::now()->subdays(182))->where('status', 'delivered')->where('seller_id', auth()->user()->id)->sum('cod_amount');
        $data['last_year_orders'] = Order::where('created_at','>=',Carbon::now()->subdays(365))->where('status', 'delivered')->where('seller_id', auth()->user()->id)->sum('cod_amount');

        $data['total_cancelled_orders'] = Order::where('status', 'cancelled')->where('seller_id', auth()->user()->id)->count();
        $data['total_confirmed_orders'] = Order::where('status', 'confirmed')->where('seller_id', auth()->user()->id)->count();
        $data['total_delivered_orders'] = Order::where('status', 'delivered')->where('seller_id', auth()->user()->id)->count();

        // dd(Carbon::now()->subdays(365));
        $data['LvsO'] = [];
        $data['LvsO']['7_dates'] = array(1,2,3,4,5,6,7);
        $data['LvsO']['leads'] = [];
        $data['LvsO']['orders'] = [];
        $data['LvsO']['dates'] = [];

        foreach ($data['LvsO']['7_dates'] as $key => $value) {
            $data['LvsO']['dates'][] = Carbon::now()->subdays($value)->diffForHumans();

            $ll = new LeadsList();
            $seller_llist = $ll->myListsWithDate(Carbon::now()->subdays($value));
            if(empty($seller_llist)){
                $leadsInside = 0;
            }else{
                $leadsInside = 0;
                foreach ($seller_llist as $key ) {
                    $leadsInside += Lead::where('leads_list_id', $key['id'])->count();
                }
            }
            
            $data['LvsO']['leads'][] = $leadsInside;
            $data['LvsO']['orders'][] = Order::where('created_at','>=',Carbon::now()->subdays($value))->where('seller_id', auth()->user()->id)->count();

        }

        $data['total_sellers'] = User::all()->count();
        $data['total_leads'] = Lead::all()->count();
        return view('user.home', compact('data'));
    }
}
