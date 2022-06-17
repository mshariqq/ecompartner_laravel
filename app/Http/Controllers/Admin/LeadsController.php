<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Lead;
use App\LeadsList;

class LeadsController extends Controller
{
    // sell all leads in admin
    public function allLeads(){
        $leads = LeadsList::paginate(10);
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

    public function ordersOfLead($leadid){
        $orders = Lead::where("leads_list_id", $leadid)->paginate(10);
        $lead = LeadsList::find($leadid);
        return view('admin.leads.orders-of-lead', compact('orders', 'lead'));
    }

}