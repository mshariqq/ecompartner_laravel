<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lead extends Model
{
    public function list(){
        return $this->hasOne('App\LeadsList','id','leads_list_id'); 
    }

}
