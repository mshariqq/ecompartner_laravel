<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Lead;
use App\LeadsList;
use App\Order;
use App\Product;

class LeadsController extends Controller
{

    public function importLeads(){
        return redirect()->back()->with('error', "Import from your Seller account not from admin account!");
    }
    // sell all leads in admin
    public function allLeads(){
        $leads = LeadsList::orderBy('id','DESC')->paginate(10);
        return view('admin.leads.all-leads', compact('leads'));
    }

    // admin can change the status
    public function changeLeadStatus($id, $status){
        $lead = LeadsList::find($id);
        if($lead){
            $lead->status = $status;
            $update = $lead->save();
            if($update){
                return array(
                    'code' => 200,
                    'msg' => 'success'
                );
            }else{
                return array(
                    'code' => 500,
                    'msg' => 'error occured while updating the record'
                );
            }

        }else{
            return array(
                'code' => 401,
                'msg' => 'not found'
            );
        }
    }
    
    public function allOrders(){
        $orders = Lead::paginate(10);
        return view('admin.leads.all-orders', compact('orders'));

    }

    // admin can change the order status
    public function changeOrderStatus($id, $status){
            $lead = Lead::find($id);
            if($lead){
                $lead->status = $status;
                
                    if($status == "confirmed"){
                        // convert to order
                         // If lead new status is match for order, then copy this record to orders table
                        $co = $this->createNewOrder($id, $status);
                        if($co['0']){
                            $lead->save();

                            return array(
                                'code' => 200,
                                'msg' => 'success'
                            );

                        }else{
                            return array(
                                'code' => 500,
                                'msg' => $co['1']
                            );
                        }
                    }else{
                        $lead->save();

                    }

                    return array(
                        'code' => 200,
                        'msg' => 'success'
                    );
                   
    
            }else{
                return array(
                    'code' => 401,
                    'msg' => 'not found'
                );
            }
    }

    public function createNewOrder($id, $status){
        $lead = Lead::find($id);

        # decrease the quantity
        $product = Product::find($lead->product_id);
        # check if we have that product
        if($product){

            # decrease the product
            if($product->stock < $lead->pieces){
                return array(false, 'Product Stock is Empty');
            }
            $product->stock = $product->stock - $lead->pieces;
            $updateProduct = $product->save();
            if($updateProduct){

                $order = new Order();
                $order->lead_id = $lead->id;
                $order->seller_id = $lead->list->user->id;
                $order->name = $lead->name;
                $order->delivery_address = $lead->delivery_address;
                $order->city = $lead->city;
                $order->phone_number = $lead->phone_number;
                $order->country = $lead->country;
                $order->cod_currency = $lead->cod_currency;
                $order->cod_amount = $lead->cod_amount;
                $order->pieces = $lead->pieces;
                $order->shipment_description = $lead->shipment_description;
                $order->status = $status;
        
                $save = $order->save();
                if($save){
                    // if order saved
                    // create new TRK id and update the order
                    $nOrder = Order::find($order->id);
                    $TRK = array();
                    $TRK['str1'] = rand(0,10);
                    $TRK['str2'] = rand(0,12);
                    $TRK['id'] = $order->id;
                    $nOrder->tracking_id = "AWB" . $TRK['str1'] . $TRK['str2'] . $this->getOrderAlpha($TRK['str1']) . $this->getOrderAlpha($TRK['str2']) . $TRK['id'];
                    $update = $nOrder->save();
                    if($update){
                        return array(true, 'success');

                    }else{
                        return array(false, 'Error while generating tracking ID');

                    }
                }else{
                    // if order error then revert the deacrese 
                    $product = Product::find($lead->product_id);
                    $product->stock += $lead->pieces;
                    $product->save(); 
                    
                    return array(false, 'Error while saving order data');
                }
            }else{
                return array(false, 'Error while decreasing product stock');
            }

        }else{
            return array(false, 'Product Not Found');
        }
    }

    private function getOrderAlpha($int){
        $alpha = array(
            0 => 'A',
            1 => 'B',
            2 => 'C',
            3 => 'D',
            4 => 'E',
            5 => 'F',
            6 => 'G',
            7 => 'H',
            8 => 'I',
            9 => 'J',
            10 => 'K',
            11 => 'L'
        );
        return $alpha[$int];
    }

    public function ordersOfLead($leadid){
        $orders = Lead::where("leads_list_id", $leadid)->orderBy('id','DESC')->paginate(10);
        $lead = LeadsList::find($leadid);
        return view('admin.leads.orders-of-lead', compact('orders', 'lead'));
    }

}