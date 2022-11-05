<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class PurchaseRequest extends Model
{
    public function seller(){
        return $this->hasOne('App\User','id','seller_id'); 
    }

    public function product(){
        return $this->hasOne('App\Product', 'id', 'product_id'); 
    }
}