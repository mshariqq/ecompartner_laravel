<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;

use App\Product;
use App\PurchaseRequest;
use App\Warehouse;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class WarehouseController extends Controller
{

    public function all(){
        
        $warehouses = Warehouse::where('seller_id', auth()->user()->id)->paginate(10);
        return view('user.warehouses.all', compact('warehouses'));

    }

    public function allProducts($id){
        
        $products = Product::where('warehouse_id', $id)->paginate(10);
        return view('user.warehouses.all', compact('products'));

    }
    
    public function new(){
        return view('user.warehouses.new');

    }

    public function insert(Request $request){
        $wr = new Warehouse();

        $wr->name = $request->name;
        $wr->status = $request->status;
        $wr->location = $request->location;
        $wr->seller_id = auth()->user()->id;

        $save = $wr->save();
        if($save){
            return Redirect::route('warehouses.all')->with('success', "Warehouse created");
        }else{
            return Redirect::route('warehouses.all')->withErrors('error', "Something went wrong");

        }
    }

    public function wareouseProducts($id){
        $products = Product::where('warehouse_id', $id)->paginate(25);
        $warehouse = Warehouse::find($id);
        return view('user.warehouses.warehouse-products', compact('products', 'warehouse'));

    }

    public function newWareouseProduct($id){
        $warehouse = Warehouse::find($id);
        return view('user.warehouses.new-warehouse-product', compact('warehouse'));

    }

    public function insertWareouseProduct(Request $request){

        if($request->file('photo')){
            // uplaod the file
            $file = $request->file('photo');

            //Move Uploaded File
            $destinationPath = 'uploads/sellers/products/' . auth()->user()->id;
            $file_with_destination = $destinationPath . "/" . $file->getClientOriginalName();
            $move = $file->move($destinationPath,$file->getClientOriginalName());

            if($move){
                $product = new Product();

                $product->name = $request->name;
                $product->description = $request->description;
                $product->stock = $request->stock;
                $product->price = $request->price;
                $product->status = $request->status;
                $product->photo = $file_with_destination;
                $product->warehouse_id = $request->warehouse_id;

                $save = $product->save();
                if($save){
                    return redirect("seller/warehouses/products/".$request->warehouse_id)->with('success', 'Error while uploading the Photo');

                }else{
                    return Redirect::back()->with('errors', 'Error while saving the data');

                }
            }else{
                return Redirect::back()->with('errors', 'Error while uploading the Photo');
            }

        }else{
            return Redirect::back()->with('errors', 'Product Photo Missing');
        }
      
    }

    public function myProducts(){
        $warehouse = Warehouse::where('seller_id', auth()->user()->id)->paginate(10);
        return view('user.warehouses.my-product', compact('warehouse'));
    }

    public function requestStock($product_id){
        $product = Product::find($product_id);
        return view('user.warehouses.request-stock', compact('product'));
    }

    public function requestStockInsert(Request $request){
        $pr = new PurchaseRequest();

        $pr->seller_id = auth()->user()->id;
        $pr->product_id = $request->product_id;
        $pr->qty = $request->qty;
        $pr->status = 'pending';
        $save = $pr->save();

        if($save){
            return redirect()->route('warehouses.product.request.all')->with('success', 'Reuest Submitted!');
        }else{
            return Redirect::back()->with('errors', 'Error while inserting data');

        }
    }

    public function myRequests(){
        $reqs = PurchaseRequest::paginate(50);
        return view('user.warehouses.all-requests', compact('reqs'));
    }

}