<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ph extends Model
{
    //


    public function user()
    {
    	return $this->belongsTo('App\User','user_id');
    }


      public function gh()
    {
        return $this->hasOne('App\Gh' ,'ph_id');
    }


    public function insurance_merge()
    {
        return $this->hasOne('App\MergeInsurance' ,'ph_id');
    }
    

    public function main_merge()
    {
        return $this->hasMany('App\MergeMain' ,'ph_id');
    }
}
