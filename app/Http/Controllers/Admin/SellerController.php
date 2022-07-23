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

    public function profileBlock($id, $status){
        $seller = User::find($id);
        if($status == 'true'){
            $seller->status = 'blocked';
            if($seller->save()){
                return redirect()->back()->with('success', "Seller Blocked!");
    
            }else{
                return redirect()->back()->with('error', "Error while updating database!");
    
            }
        }else{
            $seller->status = 'active';
            if($seller->save()){
                return redirect()->back()->with('success', "Seller Un Blocked!");
    
            }else{
                return redirect()->back()->with('error', "Error while updating database!");
    
            }
        }
        
    }
}