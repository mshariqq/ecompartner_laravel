<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;

class SellerController extends Controller
{
    public function index(){
        $sellers = User::paginate(50);
        return view('admin.sellers.index', compact('sellers'));

    }

    public function addSeller(){
        return view('admin.sellers.add');

    }

    public function profile($id){
        $seller = User::find($id);
        if($seller){
            return view('admin.sellers.profile', compact('seller'));
        }else{
            return redirect()->back()->with('error', "Seller not found");
        }
    }
}