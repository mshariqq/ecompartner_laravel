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
}