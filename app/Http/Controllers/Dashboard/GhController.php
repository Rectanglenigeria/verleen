<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\Controller;

use App\User;

use App\MergeInsurance;

use App\MergeMain;

use App\Ph;

use App\Gh;

use App\Config;

use App\PhConfig;

use App\RegistrationBonus;

use App\ReferalBonus;


class GhController extends Controller
{
    //

    public function getHelp($id){

    	$ph_id=$id;

    	$ph=Ph::where('id', $ph_id)->first();

    	//check for recommitment

    	$phRcPrivateKey=$ph->rc_private_key;

    	$recommitmentPh=Ph::where('rc_public_key', $phRcPrivateKey)->first();

    	if(empty($recommitmentPh)){

    		return Redirect::to(route('user.help.recommit',['id'=>$ph_id]))->with('notification', 'To enable GH, make a recommitment PH not less that your previous PH value  and get its downpayment confirmed');
    	}else{

    		//

    		if($recommitmentPh->insurance_merge->has_confirmed_payment==1){


    			if(isset($ph->gh->id)){

    				return Redirect::back()->with('notification', 'You already Ghed');

    			}else{

    			


    		if(Auth::user()->currency=='lc')
    		{
    			//for local currency

    			$roiValue=PhConfig::where('currency','lc')->first()->roi_value;

    		}elseif(Auth::user()->currency=='eth')
    		{
    			//for eth currency

    			$roiValue=PhConfig::where('currency','eth')->first()->roi_value;

    			
    		}else{

    			//for etn currency
    			$roiValue=PhConfig::where('currency','etn')->first()->roi_value;

    			
    			}


    			$cashOutAmount=(($roiValue/100)*$ph->amount)+($ph->amount);


    			//submit GH

    			$gh=new Gh;

    			$gh->user_id=Auth::user()->id;

    			$gh->ph_id=$ph_id;

    			$gh->amount=$cashOutAmount;


    			$gh->remainance=$cashOutAmount;


    			$gh->save();


    			Ph::where('id', $ph_id)->update(['has_ghed'=>1]);


    			return Redirect::back()->with('notification', 'You successfully Ghed. You will be merged with another shortly.');


    		}






    		}else{


    			return Redirect::back()->with('notification', 'You must fufill downpayment of your recommitment');


    		}

    	}


    }
}
