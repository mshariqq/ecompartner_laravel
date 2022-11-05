<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Product;
use App\PurchaseRequest;

class PurchaseRequests extends Controller
{

    public function all(){
        $reqs = PurchaseRequest::orderBy('created_at', 'DESC')->paginate(25);
        return view('admin.purchases.requests', compact('reqs'));
    }

    public function confirm($id){
        $req = PurchaseRequest::find($id);
        $product = Product::find($req->product->id);
        if($product){
            //  if product found
            $new_stock = $product->stock + $req->qty;
            $product->stock = $new_stock;
            if($product->save()){
                // change request status after stock update
                // if it is available
                $req->status = 'confirmed';
                if($req->save()){                        
                    return redirect()->route('admins.purchase.requests')->with('success', "Request was confirmed");
    
                }else{
                    return redirect()->back()->with('error', "Error while updating the request database");
    
                }
            }
        }else{
            return redirect()->back()->with('error', "Product Not Found");

        }

    }

    public function reject($id){
        $req = PurchaseRequest::find($id);
        if($req){
            // if it is available
            $req->status = 'rejected';
            if($req->save()){
                return redirect()->route('admins.purchase.requests')->with('success', "Request was Rejected");
            }else{
                return redirect()->back()->with('error', "Error while updating the request database");

            }
        }else{
            return redirect()->back()->with('error', "Request not found, maybe it is deleted from database");
        }
    }
}