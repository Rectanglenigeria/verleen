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

class PhController extends Controller
{
    //

  


      public function showRcForm($id)
    {


        return view('dashboard.ph.recommit',['ph_id'=>$id]);
    }



    public function showPhForm()
    {
        $achieved=Ph::where('user_id', Auth::user()->id)->orderBy('id','desc')->get();

        return view('dashboard.ph.view' ,['achieved'=>$achieved]);
    }



    public function createRc(Request $request)

    {

         //min and maximu ph validation
        $userCurrency=Auth::user()->currency;

        if($userCurrency=='lc'){

            $min_ph=PhConfig::where('currency','lc')->first()->min_ph_value;

            $max_ph=PhConfig::where('currency','lc')->first()->max_ph_value;

            $dpr=User::where('is_lcdpr', 1)->inRandomOrder()->first();





        

        }elseif($userCurrency=='eth'){

            $min_ph=PhConfig::where('currency', 'eth')->first()->min_ph_value;
            $min_ph=$min_ph/10;

            $max_ph=PhConfig::where('currency','eth')->first()->max_ph_value;
            $max_ph=$max_ph/10;

            $dpr=User::where('is_ethdpr', 1)->inRandomOrder()->first();

            

        }else{
            //its is eth
            $min_ph=PhConfig::where('currency','etn')->first()->min_ph_value;

            $max_ph=PhConfig::where('currency','etn')->first()->max_ph_value;

            $dpr=User::where('is_ethpr', 1)->inRandomOrder()->first();

            
        }



        if($request->amount < $min_ph){

            return Redirect::back()->with('notification', 'PH must not be lesser than '.($min_ph));

        }elseif($request->amount > $max_ph)

        {
            return Redirect::back()->with('notification', 'PH must not be greater than '.($max_ph));

        }else{


            $ph=Ph::where('id', $request->ph_id)->first();

            if($request->amount < $ph->amount){

                return Redirect::back()->with('notification', 'Recommitment must not be  lesser than previous PH');

            }else{


                //create ph

                $rc=new Ph;

                $rc->user_id=Auth::user()->id;

                $rc->amount=$request->amount;

                $rc->reminance=$request->amount;

                $rc->rc_public_key= $ph->rc_private_key;

                $rc->rc_private_key=$rc_private_key=mt_rand(10000, 1000000);

                $rc->save();


                //merge downpayment

                //get dpr gh

                $dpr_gh=Gh::where('user_id', $dpr->id)->first();

                $rc_ph=Ph::where('rc_private_key', $rc_private_key)->first();

                //merge 

                $rc_ph_amount=$rc_ph->amount;

            //extract downpayment amount

            $downpaymentPercent=PhConfig::where('currency', $ph->user->currency)->first()->downpayment;


            $downpaymentAmount=($downpaymentPercent/100)*$rc_ph->amount;



            //update insurance merge table
                //populate all fields

            $merge = new MergeInsurance;

            $merge->ph_user_id=$rc_ph->user->id;

            $merge->gh_user_id=$dpr_gh->user->id;

            $merge->ph_id=$rc_ph->id;

            $merge->gh_id=$dpr_gh->id;

            $merge->amount=$downpaymentAmount;


            if($rc_ph->user->currency=='eth' || $rc_ph->user->currency=='etn')
            {
                $merge->is_crypto=1;
            }

            $merge->save();




            //update ph table
               //update reminance

                $ph_remainance=$rc_ph->reminance-$downpaymentAmount;
                
                Ph::where('id', $rc_ph->id)->update(['reminance'=>$ph_remainance]);    

            //update gh table
                //update remainance

                $gh_remainance=$dpr_gh->remainance-$downpaymentAmount;
                
                Gh::where('id', $dpr_gh->id)->update(['remainance'=>$gh_remainance]);




                return Redirect::back()->with('notification',"You've successfully made your recommitment PH. You've been merged to pay its downpayment. Check your dashboard for merging details.");
               

            }

        }



    }



    public function create(Request $request)

    {


        //min and maximu ph validation
        $userCurrency=Auth::user()->currency;

        if($userCurrency=='lc'){

            $min_ph=PhConfig::where('currency','lc')->first()->min_ph_value;

            $max_ph=PhConfig::where('currency','lc')->first()->max_ph_value;

        

        }elseif($userCurrency=='eth'){

            $min_ph=PhConfig::where('currency', 'eth')->first()->min_ph_value;
            $min_ph=$min_ph/10;

            $max_ph=PhConfig::where('currency','eth')->first()->max_ph_value;
            $max_ph=$max_ph/10;

            

        }else{
            //its is eth
            $min_ph=PhConfig::where('currency','etn')->first()->min_ph_value;

            $max_ph=PhConfig::where('currency','etn')->first()->max_ph_value;

            
        }



        if($request->amount < $min_ph){

            return Redirect::back()->with('notification', 'PH must not be lesser than '.($min_ph));

        }elseif($request->amount > $max_ph)

        {
            return Redirect::back()->with('notification', 'PH must not be greater than '.($max_ph));

        }else{


            $isLessThanPreviousPH=$this->checkIfPhLessThanPreviousPH($request->amount);

                    if($isLessThanPreviousPH==true){

                        return Redirect::back()->with('notification', 'PH can not be less than your previous PH');

                    }else{



            if(Auth::user()->currency=='lc'){

                $remainder=fmod($request->amount,PhConfig::where('currency','lc')->first()->ph_multiple);

                if($remainder<=0){

                    //user can only have 1 active PH

                    if($this->hasActivePh())
                    {

                        return Redirect::back()->with('notification', 'You can only have one active PH');

                    }else{



                    

                    //create ph
            $formData=$request->all();

        $rule=array(
            
            'amount'=>'required|numeric'
            );

        $message=array(
            
            'amount.required'=>'This field is required'
            );

        $validator=Validator::make($formData, $rule, $message);

        if($validator->fails()){
            return Redirect::to(route('user.help.provide'))->withErrors($validator)->withInput();

        }else{

        $rc_key=mt_rand(100000, 1000000);

        $ph=new Ph;

        $ph->amount=$request->amount;

        $ph->user_id=Auth::user()->id;

        $ph->reminance=$request->amount;

        $ph->growth=0;

        $ph->rc_private_key=$rc_key;

        $ph->remember_token=$request->_token;

        $ph->save();

         //allocate registartion bonus
        $alreadyAllocated=RegistrationBonus::where('user_id',Auth::user()->id)->count();

        if($alreadyAllocated<1){



             $this->allocateRegBonus($request->amount);
        }


        //allocate referal bonus
        $alreadyAllocated=ReferalBonus::where([['referee_id', Auth::user()->id],['referee_ph_id','>', 0]])->count();

         

        if($alreadyAllocated<1){



             $referee_ph_id=Ph::where('user_id', Auth::user()->id)->orderBy('id', 'asc')->first()->id;

            
             $this->allocateRefBonus($request->amount, $referee_ph_id);
        }



       
       

        return Redirect::back()->with('notification','Help successfully provided'.fmod($request->amount,PhConfig::where('currency','lc')->first()->ph_multiple));

        }

            }

                //process other currencies
                
            }else{

                return Redirect::back()->with('notification', 'PH must be in multiple of '.PhConfig::where('currency','lc')->first()->ph_multiple);
            }


            

        }else{


            if($this->hasActivePh()){

                return Redirect::back()->with('notification', 'You can only have one active PH');

            }else{


                //create ph
            $formData=$request->all();

        $rule=array(
            
            'amount'=>'required|numeric'
            );

        $message=array(
            
            'amount.required'=>'This field is required'
            );

        $validator=Validator::make($formData, $rule, $message);

        if($validator->fails()){
            return Redirect::to(route('user.help.provide'))->withErrors($validator)->withInput();

        }else{

        $rc_key=mt_rand(100000, 1000000);

        $ph=new Ph;

        $ph->amount=$request->amount;

        $ph->user_id=Auth::user()->id;

        $ph->reminance=$request->amount;

        $ph->growth=0;

        $ph->rc_private_key=$rc_key;

        $ph->remember_token=$request->_token;

        $ph->save();

        //allocate registartion bonus
        $alreadyAllocated=RegistrationBonus::where('user_id',Auth::user()->id)->count();

        if($alreadyAllocated<1){

             $this->allocateRegBonus($request->amount);
        }


        //allocate referal bonus

       $alreadyAllocated=ReferalBonus::where([['referee_id', Auth::user()->id],['referee_ph_id','>', 0]])->count();

        if($alreadyAllocated<1){

             $referee_ph_id=Ph::where('user_id', Auth::user()->id)->orderBy('id', 'asc')->first()->id;

             $this->allocateRefBonus($request->amount, $referee_ph_id);
        }
       

        return Redirect::back()->with('notification','Help successfully provided');

        }

            }


            }


        }

    }


}




//custom funtion

public function checkIfPhLessThanPreviousPH($amount)
{
    $previouPH=Ph::where('user_id',Auth::user()->id)->orderBy('id','desc')->first();

    if(!empty($previouPH)){

        if($amount<$previouPH->amount){

            return true;

        }else{

            return false;
        }

    }else{

        return false;
    }
}


public function allocateRegBonus($amount)
{
     //allocate registartion bonus

            $userCurrency=User::where('id', Auth::user()->id)->first()->currency;


        if($userCurrency=='lc'){

            if($amount>=10000 && $amount<=19000){$bonus=2000;}
            elseif($amount>=20000 && $amount<=99000){$bonus=3000;}
            elseif($amount>=100000 && $amount<=149000){$bonus=5000;}
            else{$bonus=10000;}

        

        }elseif($userCurrency=='eth'){

            if($amount>=0.2 && $amount<=0.39){$bonus=0.002;}
            elseif($amount>=0.4 && $amount<=0.59){$bonus=0.003;}
            elseif($amount>=0.6 && $amount<=0.79){$bonus=0.007;}
            else{$bonus=0.01;}

            

        }else{
            //its is etn
            if($amount>=10 && $amount<=100){$bonus=1;}
            elseif($amount>=101 && $amount<=300){$bonus=2.5;}
            elseif($amount>=301 && $amount<=700){$bonus=10;}
            else{$bonus=10;}
            
        }


        $regBonus=new RegistrationBonus;

        $regBonus->user_id=Auth::user()->id;

        $regBonus->amount=$bonus;

        $regBonus->save();

        //allocate registartion bonus
}

public function hasActivePh()
{

    $lastPh=Ph::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();

    if(empty($lastPh)){

        return false;

    }else{


    $receivedPayment=MergeMain::where([['gh_user_id', Auth::user()->id],['ph_id', $lastPh->id],['has_confirmed_payment', 1]])->sum('amount');

    $roi_value=PhConfig::where('currency', Auth::user()->currency)->first()->roi_value;

    $lastPhGhValue=$lastPh->amount + ($lastPh->amount*($roi_value/100));

    if($receivedPayment >= $lastPhGhValue){

        return false;

    }else{

        return true;

    }


    }


}



public function allocateRefBonus($amount, $referee_ph_id)
{

    $bonusPercent=(Config::orderBy('id', 'asc')->first()->referal_bonus_value)/100;

    $referee_id=Auth::user()->id;

    $isRefereeFirstPh=Ph::where('user_id', $referee_id)->count();

    if($isRefereeFirstPh == 1)
    {
        $wasReferred=ReferalBonus::where('referee_id', $referee_id)->count();

        if($wasReferred == 1){

            $referal=ReferalBonus::where('referee_id', $referee_id)->first();

            if(Auth::user()->currency == $referal->referal->currency)
                {
                    $bonus=$bonusPercent*$amount;

                }elseif(Auth::user()->currency=='lc' && $referal->referal->currency=='eth')
                {
                     $bonus=($bonusPercent*$amount)/185577;

                }elseif(Auth::user()->currency=='lc' && $referal->referal->currency=='etn')
                {
                     $bonus=($bonusPercent*$amount)/10.31;

                }elseif(Auth::user()->currency=='eth' && $referal->referal->currency=='lc')
                {
                     $bonus=($bonusPercent*$amount)*185577;

                }elseif(Auth::user()->currency=='eth' && $referal->referal->currency=='etn')
                {
                     $bonus=($bonusPercent*$amount)/18164.81;

                }elseif(Auth::user()->currency=='etn' && $referal->referal->currency=='eth')
                {
                     $bonus=($bonusPercent*$amount)*18164.81;

                }elseif(Auth::user()->currency=='etn' && $referal->referal->currency=='lc')
                {
                     $bonus=($bonusPercent*$amount)*10.81;
                }


                ReferalBonus::where('referee_id',$referee_id)->update(['amount'=>$bonus,'referee_ph_id'=>$referee_ph_id]);

        }
    }

}
   


}
