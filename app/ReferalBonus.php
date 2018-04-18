<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ReferalBonus extends Model
{
    //

     public function referee()
    {
    	return $this->belongsTo('App\User','referee_id');
    }


    public function referal()
    {
    	return $this->belongsTo('App\User','referal_id');
    }

}
