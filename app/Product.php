<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public function warehouse(){
        return $this->hasOne('App\Warehouse','id','warehouse_id'); 
    }
}
