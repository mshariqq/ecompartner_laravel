<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Lead;
use App\LeadsList;
use App\Order;
use App\Product;
use App\ProductPurchase;
use App\Warehouse;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{

    public function allProducts($where = false){
        if($where != false){
            $products = Product::where('status', $where)->paginate(10);

        }else{
            $products = Product::paginate(10);

        }
        return view('admin.warehouses.all-products', compact('products'));

    }

    public function all(){

        $warehouses = Warehouse::paginate(25);
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

    public function productApproval($id, $status){
        if($status == 'approve'){
            $status = 'active';

        }elseif($status == 'reject'){
            $status = 'rejected';
        }
        // get the product
        $product = Product::find($id);
        if($product){
            $product->status = $status;
            $product->approval_date = Carbon::today();
            $product->approved_admin = auth()->user()->id;
            if($product->save()){
                return redirect()->back()->with('success', "Product Approved");

            }else{
                return redirect()->back()->with('error', "Error while updating the product database!");

            }
        }else{
            return redirect()->back()->with('error', "No Product Found, or ID is incorrect");
        }

    }

}
