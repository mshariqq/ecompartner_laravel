<?php

namespace App\Http\Controllers;

use App\Lead;
use App\LeadsList;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class LeadsController extends BaseController
{

    public function importLeads(){
        return view('user.leads.import');
    }

    public function storeLeads(Request $request){

        if ($request->file('csv')){

            // uplaod the file
            $file = $request->file('csv');
   
            //Move Uploaded File
            $destinationPath = 'uploads/sellers/' . auth()->user()->id;
            $file_with_destination = $destinationPath . "/" . $file->getClientOriginalName();
            $move = $file->move($destinationPath,$file->getClientOriginalName());

            if($move){
                
                // create lead and get id
                $Lead_List = new LeadsList();
                $Lead_List->name = $request->name;
                $Lead_List->user_id = auth()->user()->id;
                $Lead_List->status = 'Uploaded';

                $saveLeadList = $Lead_List->save();
                if($saveLeadList){
                    // if lead list is success, get the id
                    $LLid = $Lead_List->id;

                    // Open uploaded CSV file with read-only mode
                    $csvFile = fopen($file_with_destination, 'r');
        
                    // Skip the first line
                    fgetcsv($csvFile);
        
                    // Parse data from CSV file line by line
                    $LeadsLog = "Lead Log for LeadsList id = " . $LLid;
                    while (($getData = fgetcsv($csvFile, 10000, ",")) !== FALSE)
                    {

                        if(empty($getData)){
                            $LeadsLog .= "Empt Row Given in CSV <br>";

                        }else{
                            if(empty($getData[0]) && empty($getData[1]) && empty($getData[2]) && empty($getData[3]) && empty($getData[4])){
                                $LeadsLog .= "Empt Row Value given in this row <br>";
                            }else{
                                // model of leads
                                $Leads = new Lead();
                                $Leads->name = $getData[0];
                                $Leads->delivery_address = $getData[1];
                                $Leads->city = $getData[2];
                                $Leads->phone_number = $getData[3];
                                $Leads->country = $getData[4];
                                $Leads->cod_currency = $getData[5];
                                $Leads->cod_amount = $getData[6];
                                $Leads->pieces = $getData[7];
                                $Leads->shipment_description = $getData[8];
                                $Leads->leads_list_id = $LLid;
                                $Leads->status = 'Uploaded';

                                // insert the current row
                                $save_lead = $Leads->save();
                                if($save_lead){
                                    // if inserted then save to log
                                    $LeadsLog .= "Lead with id " . $Leads->id . "Inserted success <br>";
                                }else{
                                    // if error, then save to log
                                    $LeadsLog .= "Lead after id " . $Leads->id . "Inserting error <br>";

                                }
                            }

                        }
                        
                    }

                    // Upload the leads list log
                    $InsertedLeadsList = LeadsList::find($LLid);
                    $InsertedLeadsList->log = $LeadsLog;
                    $InsertedLeadsList->save();
        
                    // Close opened CSV file
                    fclose($csvFile);

                    // return
                    return array(
                        'code' => 200,
                        'msg'   => 'success'
                    );
                }else{
                    return array(
                        'code' => 500,
                        'msg'   => 'Error, Lead List creating error'
                    );
                }

            }else{
                return array(
                    'code' => 500,
                    'msg'   => 'Error, File not uploaded'
                );
            }         
    
         }else{
            return array(
                'code' => 500,
                'msg'   => 'File Not Found'
            );
         }
    }

    public function leadsListIndex(){
        $llist = LeadsList::where('user_id', auth()->user()->id)->simplePaginate(10);
        $ll_leads = [];
        foreach ($llist as $key => $value) {
            $getListCount = Lead::where('leads_list_id', $value->id)->get();
            $ll_leads[$value->id] = count($getListCount);
        }
        return view('user.leads.leads-list', compact('llist', 'll_leads'));

    }

    public function viewLeads($id){
        $leads = Lead::where('leads_list_id', $id)->simplePaginate(50);
        $leads_list = LeadsList::find($id);
        return view('user.leads.index', compact('leads', 'leads_list'));
    }

}
