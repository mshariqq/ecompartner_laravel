<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin;
use App\Lead;
use App\Order;
use Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AdminsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $admins = Admin::all();

        $data = [
            'admins' => $admins
        ];

        return view('admin.admins.index')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = ['previous_route' => "suppliers.index"];

        return view('admin.admins.create')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $this->validator($data)->validate();

        $admin = Admin::create([
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);

        if(isset($data->super_admin) && $data->super_admin == true) {
            $admin->is_super = true;
        }

        if(isset($data->phone)) {
            $admin->phone = $request->phone;
        }

        $admin->save();

        $admin->sendEmailVerificationNotification();

        return redirect('/admin/admins')->with('message', 'Admin Created');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['nullable','string', 'regex:/^(961(3|70|71)|(03|70|71))\d{6}$/'],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('messages.admin.under-development');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $admin = Admin::findorfail($id);

        $loggedInAdmin = Auth::user();

        if($admin->id == $loggedInAdmin->id) {
            return redirect()->route('admin.profile');
        }

        if($admin->is_super == true) {
            return back()->withErrors('You can\'t update another super admin');
        }

        $data = [
            'admin' => $admin,
            'previous_route' => "suppliers.index"
        ];

        return view('admin.admins.edit')->with($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $this->validate($request, [
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255'],
            'phone' => ['nullable','string', 'regex:/^(961(3|70|71)|(03|70|71))\d{6}$/'],
        ]);

        $admin = Admin::findorfail($id);

        $admin->first_name = $data['first_name'];
        $admin->last_name = $data['last_name'];

        if(isset($data['super_admin']) && $data['super_admin'] == true) {
            $admin->is_super = true;
        }

        if(isset($data['phone']) && $data['phone'] != $admin->phone) {
            $admin->phone = $data['phone'];
        }

        $admin->save();

        if($data['email'] != $admin->email) {
            $this->validate($request, [
                'email' => ['required', 'string', 'email', 'max:255', 'unique:admins'],
            ]);
            $admin->email = $data['email'];
            $admin->email_verified_at = null;
            $admin->save();
            $admin->sendEmailVerificationNotification();
        }

        return redirect('/admin/admins')->with('message', 'Admin Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $admin = Admin::findorfail($id);

        if($admin->is_super == true) {
            return back()->withErrors('You can\'t delete another super admin');
        }

        $admin->delete();

        return redirect('/admin/admins')->with('message', 'Admin Deleted');
    }

    public function todayFilter(Request $request){
        $date = $request->date;
        $toDate = $date . " 23:59:59";
        $fromDate = $date . " 00:00:00";        
        
        if(isset($request->date)){
            $data= [];
            //  leads
            $data['leads'] = Lead::whereBetween('created_at', [$fromDate, $toDate])->count();
            //  confirmed
            $data['confirmed'] = Order::whereBetween('created_at', [$fromDate, $toDate])->where('status', 'confirmed')->count();
            // delivered
            $data['delivered'] = Order::whereBetween('created_at', [$fromDate, $toDate])->where('status', 'delivered')->count();
            // pending
            $data['pending'] = Lead::whereBetween('created_at', [$fromDate, $toDate])->where('status', 'pending')->count();
            return response()->json(array('code' => 200, 'data' => $data));
        }else{
            return response()->json(array('code' => 401, "data" => "date missing"));
        }
    }

    public function DashAJaxDataFetch(Request $request){
        
        if($request->condition == 'total-cod'){
            $orders = Order::paginate(100);
        }
        else{
            $orders = Order::where('status', $request->condition)->paginate(100);
        }

        return view('admin.reports.cod_analysi_ajaxdata', compact('orders'));
    }
}
