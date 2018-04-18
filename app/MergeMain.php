<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MergeMain extends Model
{
    //

     public function ph_user()
    {
    	return $this->belongsTo('App\User','ph_user_id');
    }

    public function gh_user()
    {
    	return $this->belongsTo('App\User','gh_user_id');
    }
}
