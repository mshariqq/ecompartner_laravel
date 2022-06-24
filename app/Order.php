<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    public function lead(){
        return $this->hasOne('App\Lead','id','lead_id'); 
    }

    public function seller(){
        return $this->hasOne('App\User','id','seller_id'); 
    }
}
