<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Lead;
use App\LeadsList;
use App\Order;
use App\Product;
use App\Warehouse;

class WarehouseController extends Controller
{

    public function allProducts(){
        
        $products = Product::paginate(10);
        return view('admin.warehouses.all-products', compact('products'));

    }
    
    public function all(){
        
        $warehouses = Warehouse::paginate(10);
        return view('admin.warehouses.all', compact('warehouses'));

    }

}