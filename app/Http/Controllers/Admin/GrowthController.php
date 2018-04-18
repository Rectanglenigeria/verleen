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

class GrowthController extends Controller
{
    //

    public function deleteDomartAccount()

    {
        $users=User::orderBy('id', 'desc')->get();

        foreach ($users as $key => $user) {

            $user_id=$user->id;
            
            if(empty($user->phs)){

                $created_at=$user->created_at;

                $ageInSecs=(time()-strtotime($user->created_at));

                $ageInDays=floor($ageInSecs/(60*60*24));

                if($ageInDays < 4){

                    continue;

                }

                User::where('id', $user_id)->delete();

                ReferalBonus::where('referal_id', $user->id)->delete();

                RegistrationBonus::where('user_id', $user->id)->delete();

            }
        }

        echo '*ok*';

    }


    

    public function addGrowth()
    {
    	$phs=Ph::orderBy('id', 'desc')->get();


    	foreach ($phs as $key => $ph) {


    		
    		if($ph->user->currency=='lc')
    		{
    			//for local currency

    			$roiValue=PhConfig::where('currency','lc')->first()->roi_value;

    			$roiPeriod=PhConfig::where('currency','lc')->first()->roi_period;

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

    			$roiValueInInvestmentDays=($roiValue*$investmentDays)/$roiPeriod;

    			$growthInInvestmentDays=($roiValueInInvestmentDays/100)*$ph->amount;

    			//update growth column

    			Ph::where('id', $ph->id)->update(['growth'=>$growthInInvestmentDays]);

    			}



    		}elseif($ph->user->currency=='eth')
    		{
    			//for eth currency

    			$roiValue=PhConfig::where('currency','eth')->first()->roi_value;

    			$roiPeriod=PhConfig::where('currency','eth')->first()->roi_period;

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

    			$roiValueInInvestmentDays=($roiValue*$investmentDays)/$roiPeriod;

    			$growthInInvestmentDays=($roiValueInInvestmentDays/100)*$ph->amount;

    			//update growth column

    			Ph::where('id', $ph->id)->update(['growth'=>$growthInInvestmentDays]);

    			}
    		}else{

    			//for etn currency
    			$roiValue=PhConfig::where('currency','etn')->first()->roi_value;

    			$roiPeriod=PhConfig::where('currency','eth')->first()->roi_period;

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

    			$roiValueInInvestmentDays=($roiValue*$investmentDays)/$roiPeriod;

    			$growthInInvestmentDays=($roiValueInInvestmentDays/100)*$ph->amount;

    			//update growth column

    			Ph::where('id', $ph->id)->update(['growth'=>$growthInInvestmentDays]);

    			}
    		}



    	}


    	echo '*ok*';
    }
}
