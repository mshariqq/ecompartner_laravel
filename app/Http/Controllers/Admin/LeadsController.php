<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Lead;
use App\LeadsList;
use App\Order;

class LeadsController extends Controller
{
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
                $update = $lead->save();
                
                if($update){
                    if($status == "confirmed"){
                        // convert to order
                         // If lead new status is match for order, then copy this record to orders table
                        $co = $this->createNewOrder($id, $status);
                        if($co){
                            return array(
                                'code' => 200,
                                'msg' => 'success'
                            );
                        }else{
                            return array(
                                'code' => 500,
                                'msg' => 'error occured while ctreating order'
                            );
                        }
                    }

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

    public function createNewOrder($id, $status){
        $lead = Lead::find($id);

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
            return true;
        }else{
            return false;
        }
    }

    public function ordersOfLead($leadid){
        $orders = Lead::where("leads_list_id", $leadid)->orderBy('id','DESC')->paginate(10);
        $lead = LeadsList::find($leadid);
        return view('admin.leads.orders-of-lead', compact('orders', 'lead'));
    }

}