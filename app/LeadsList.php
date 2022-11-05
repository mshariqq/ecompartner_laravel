<?php
namespace App;


use Illuminate\Database\Eloquent\Model;

class LeadsList extends Model
{
    public function user(){
        return $this->hasOne('App\User','id','user_id'); 
    }

    public function myListsWithDate($date){
        return $this->where('created_at','>=',$date)->where('user_id', auth()->user()->id)->get();
    }

}
