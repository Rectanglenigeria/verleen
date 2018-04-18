<?php

namespace App\Http\Controllers\Admin;


use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\Controller;

use App\User;
use App\Gh;
use App\Ph;
use App\MergeInsurance;
use App\MergeMain;
use App\ReferalBonus;
use App\RegistrationBonus;
use App\PhConfig;

class InvestmentPeriodController extends Controller
{
    //
    public function addPeriod()
    {
    	$phs=Ph::orderBy('id', 'desc')->get();


    	foreach ($phs as $key => $ph) {



    			//calculating investment period
    			$nowTime=time(); //in millisecs

    			$timeOfPh=strtotime($ph->created_at);

    			$interval=$nowTime-$timeOfPh;

    			$TwenthyFourHInMs=24*60*60;

    			$investmentDays=floor($interval/$TwenthyFourHInMs);

    			//calculating growth for investmentDays

    			if($investmentDays > 30){

    				continue;

    			}else{

    			//update period column
    			Ph::where('id', $ph->id)->update(['period'=>$investmentDays]);

    			}


    	}

    	echo '*ok*';
    }
}
