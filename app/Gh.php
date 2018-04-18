<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gh extends Model
{
    //

    public function user()
    {
    	return $this->belongsTo('App\User','user_id');
    }


     public function insurance_merge()
    {
    	return $this->hasOne('App\MergeInsurance','gh_id');
    }

    public function main_merge()
    {
    	return $this->hasMany('App\MergeMain','gh_id');
    }

}
