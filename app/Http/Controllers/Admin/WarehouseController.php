<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Lead;
use App\LeadsList;
use App\Order;
use App\Product;
use App\ProductPurchase;
use App\Warehouse;
use Illuminate\Http\Request;

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

    public function buyStock($id){
        $product = Product::find($id);
        if($product){
            return view('admin.warehouses.purchase-stock', compact('product'));
        }else{
            return redirect()->back()->with('error', "No Product Found, or ID is incorrect");
        }
    }

    public function buyStockStore(Request $request){
        $product = Product::find($request->id);
        if($product){
            if($request->qty > $product->stock){
                return redirect()->back()->with('error', "Stock is low");
            }
            $purchase = new ProductPurchase();

            $purchase->product_id = $request->id;

            $purchase->qty = $request->qty;

            $purchase->seller_id = $product->warehouse->seller->id;
            $save = $purchase->save();
            if($save){
                // now decrease the stock of product
                $product->stock = $product->stock - $request->qty;
                $update_product = $product->save();
                if($update_product){
                    return redirect()->route('admin.warehouse.product-purchases')->with('success', "Product Purchased");

                }else{
                    return redirect()->back()->with('error', "Error while updating product stock");

                }
            }else{
                return redirect()->back()->with('error', "Error while saving purchase record");
            }
        }else{
            return redirect()->back()->with('error', "No Product Found, or ID is incorrect");
        }
    }

    public function productPurchases(){
        $purchases = ProductPurchase::orderBy('created_at', 'DESC')->paginate(25);
        return view('admin.warehouses.purchases', compact('purchases'));
    }

}