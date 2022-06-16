<?php
namespace App;


use Illuminate\Database\Eloquent\Model;

class LeadsList extends Model
{
    public function user(){
        return $this->hasOne('App\User','user_id','id'); 
    }
}
