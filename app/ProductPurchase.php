<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductPurchase extends Model
{
    public function product(){
        return $this->hasOne('App\Product','id','product_id'); 
    }

    public function seller(){
        return $this->hasOne('App\User','id','seller_id'); 
    }
}
