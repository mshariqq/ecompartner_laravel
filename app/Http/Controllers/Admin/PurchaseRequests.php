<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\PurchaseRequest;

class PurchaseRequests extends Controller
{

    public function all(){
        $reqs = PurchaseRequest::all();
        return view('admin.purchases.requests', compact('reqs'));
    }
}