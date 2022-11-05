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
            $filename =time() + auth()->user()->id .".".  $file->extension();
            $destinationPath = 'uploads/sellers/products/' . auth()->user()->id;
            $file_with_destination = $destinationPath . "/" . $filename;
            $move = $file->move($destinationPath,$filename);

            if($move){
                // check if request has screenshots files which is multiple
                if($request->file('screenshots')){
                    $screenshots = $request->file('screenshots');
                    $screenshots_array = [];
                    foreach($screenshots as $screenshot){
                        $screenshot_filename =time() + auth()->user()->id .".".  $screenshot->extension();
                        $screenshot_destinationPath = 'uploads/sellers/products/' . auth()->user()->id;
                        $screenshot_file_with_destination = $screenshot_destinationPath . "/" . $screenshot_filename;
                        $screenshot_move = $screenshot->move($screenshot_destinationPath,$screenshot_filename);
                        if($screenshot_move){
                            array_push($screenshots_array, $screenshot_file_with_destination);
                        }
                    }
                }

                $product = new Product();

                $product->name = $request->name;

                // check if product description is empty or null
                if($request->description == null){
                    $request->description = "No description given";
                }

                // dd($request->all());
                $product->description = $request->description;
                $product->stock = $request->stock;
                $product->price = $request->price;
                $product->status = 'pending';
                $product->photo = $file_with_destination;
                $product->warehouse_id = $request->warehouse_id;
                // add screenshots as json_encode arra to the product screenshots
                $product->screenshots = json_encode($screenshots_array);
                $product->conversion = $request->conversions;
                $product->cost_per_lead = $request->cost_per_lead;

                $save = $product->save();
                if($save){
                    return redirect("seller/warehouses/products/".$request->warehouse_id)->with('success', 'Product added & Submitted for Approval!');

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
