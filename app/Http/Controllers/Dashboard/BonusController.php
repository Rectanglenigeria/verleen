<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\Controller;

use App\User;

use App\Ph;

use App\Gh;

use App\MergeInsurance;

use App\MergeMain;

use App\ReferalBonus;

use App\RegistrationBonus;

class BonusController extends Controller
{
    //
    public function viewRef()
    {
    	$bonuses=ReferalBonus::where('referal_id',Auth::user()->id)->orderBy('id', 'desc')->paginate('20');

    	return view('dashboard.bonus.ref.view',['bonuses'=>$bonuses]);


    }

    public function viewReg()
    {

    	$bonus=RegistrationBonus::where('user_id',Auth::user()->id)->first();

    	return view('dashboard.bonus.reg.view',['bonus'=>$bonus]);

    }


     public function cashoutReg($id)
    {

        $amount=RegistrationBonus::where('id', $id)->first()->amount;

        $activeGh=Gh::where([['user_id', Auth::user()->id],['remainance','>', 0]])->orderBy('id', 'desc')->first();

        if(empty($activeGh)){

            return Redirect::back()->with('notification', 'You must have an active GH');

        }else{

           $new_gh_amount=$activeGh->amount+$amount;

           $new_remainance=$activeGh->remainance+$amount;

           Gh::where('id', $activeGh->id)->update(['amount'=>$new_gh_amount,'remainance'=>$new_remainance]);

           //update bonus

           RegistrationBonus::where('id', $id)->update(['has_received'=>1]);


        return Redirect::back()->with('notification', 'Bonus succefully added to your current active GH value');


        }


    }


    public function cashoutRef($id)
    {

        $bonus=ReferalBonus::where('id', $id)->first();

        $ph=Ph::where('id', $bonus->referee_ph_id)->first();

        if(empty(MergeInsurance::where([['ph_id', $ph->id],['has_confirmed_payment',1]])->first())){

            return Redirect::back()->with('notification', 'Referee yet to fulfill pledge');

        }else{

        $insurancePaid=MergeInsurance::where([['ph_id', $ph->id],['has_confirmed_payment',1]])->first()->amount;

        if(empty(MergeMain::where([['ph_id', $ph->id],['has_confirmed_payment',1]])->first())){

            $remainingPaid=0;

        }else{

            $remainingPaid=MergeMain::where([['ph_id', $ph->id],['has_confirmed_payment',1]])->sum('amount');

        }

        

        $totalPaid=$insurancePaid+$remainingPaid;

        if($totalPaid<$ph->amount){


            return Redirect::back()->with('notification', 'Referee yet to fulfill pledge completely');


        }else{


        $amount=ReferalBonus::where('id', $id)->first()->amount;

        $activeGh= Gh::where([['user_id', Auth::user()->id],['remainance','>', 0]])->orderBy('id', 'desc')->first();

        if(empty($activeGh)){

            return Redirect::back()->with('notification', 'You must have an active GH');

        }else{

           $new_gh_amount=$activeGh->amount+$amount;

           $new_remainance=$activeGh->remainance+$amount;

           Gh::where('id', $activeGh->id)->update(['amount'=>$new_gh_amount,'remainance'=>$new_remainance]);

           //update bonus

           ReferalBonus::where('id', $id)->update(['has_received'=>1]);


             return Redirect::back()->with('notification', 'Bonus succefully added to your current active GH value');


        }

         }

    }


    }


}
