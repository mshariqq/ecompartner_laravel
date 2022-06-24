<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    public function seller(){
        return $this->hasOne('App\User','id','seller_id'); 
    }

    public function products(){
        return $this->belongsToMany('App\Product'); 
    }
}
