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
use App\Message;


class MergeController extends Controller
{
    //

    public function list($filterBy)
    {


    	    //just added

        $LcPhConfig=PhConfig::where('currency','lc')->first();

        $EthPhConfig=PhConfig::where('currency','eth')->first();

        $EtnPhConfig=PhConfig::where('currency','etn')->first();
        //just added


    	if($filterBy=="downpayment"){


    		$merges=MergeInsurance::orderBy('id', 'desc')->paginate(20);



    		return view('admin.merge.downpayment.list',['merges'=>$merges, 'LcPhConfig'=>$LcPhConfig, 'EthPhConfig'=>$EthPhConfig,'EthPhConfig'=>$EthPhConfig]);


    	}else{
    		//remaining

    		$merges=MergeMain::orderBy('id', 'desc')->paginate(20);

    		return view('admin.merge.remaining.list',['merges'=>$merges, 'LcPhConfig'=>$LcPhConfig, 'EthPhConfig'=>$EthPhConfig,'EthPhConfig'=>$EthPhConfig]);

    	}
    }



public function unmergeInsurance($id)
{

		$merge=MergeInsurance::where('id', $id)->first();

		$ph=Ph::where('id', $merge->ph_id)->first();

		$gh=Gh::where('id', $merge->gh_id)->first();

		$newPhRemainance=$ph->reminance+$merge->amount;

		Ph::where('id', $merge->ph_id)->update(['reminance'=>$newPhRemainance]);


		$newGhRemainance=$gh->remainance+$merge->amount;

		Gh::where('id', $merge->gh_id)->update(['remainance'=>$newGhRemainance]);

		$merge=MergeInsurance::where('id', $id)->delete();

		return Redirect::back()->with('notification','Users successfully unmerged');

}



//for remaining

public function unmergeRemaining($id)
{

		$merge=MergeMain::where('id', $id)->first();

		$ph=Ph::where('id', $merge->ph_id)->first();

		$gh=Gh::where('id', $merge->gh_id)->first();

		$newPhRemainance=$ph->reminance+$merge->amount;

		Ph::where('id', $merge->ph_id)->update(['reminance'=>$newPhRemainance]);


		$newGhRemainance=$gh->remainance+$merge->amount;

		Gh::where('id', $merge->gh_id)->update(['remainance'=>$newGhRemainance]);

		$merge=MergeMain::where('id', $id)->delete();

		return Redirect::back()->with('notification','Users successfully unmerged');

}



public function confirmInsurance($id)
{

		MergeInsurance::where('id', $id)->update(['teller'=>'autoconfirm.jpg','has_uploaded_teller'=>1, 'has_confirmed_payment'=>1]);

		return Redirect::back()->with('notification','Merge successfully confirmed');

}

//for remaining

public function confirmRemaining($id)
{

		MergeMain::where('id', $id)->update(['teller'=>'autoconfirm.jpg','has_uploaded_teller'=>1, 'has_confirmed_payment'=>1]);

		return Redirect::back()->with('notification','Merge successfully confirmed');

}


public function takeActionOnPaymentTimeOutForInsurance()
{



        $LcPhConfig=PhConfig::where('currency','lc')->first();

        $EthPhConfig=PhConfig::where('currency','eth')->first();

        $EtnPhConfig=PhConfig::where('currency','etn')->first();
 


	$unconfirmedMerges=MergeInsurance::where([['has_confirmed_payment', 0], ['has_extended_time', 0]])->orderBy('id', 'desc')->get();


	foreach ($unconfirmedMerges as $key => $merge) {


		//check time

 if($merge->ph_user->currency=='lc'){
   $paymentTime=$LcPhConfig->payment_time;
  }elseif($merge->ph_user->currency=='eth'){
      $paymentTime=$EthPhConfig->payment_time;
  }else{
      $paymentTime=$EtnPhConfig->payment_time;
  }



$timLeftInSecs=($paymentTime*60*60)-(time()-strtotime($merge->created_at));

if($timLeftInSecs <= 0){

	//take action

	//unmerge

		$ph=Ph::where('id', $merge->ph_id)->first();

		$gh=Gh::where('id', $merge->gh_id)->first();

		$newPhRemainance=$ph->reminance+$merge->amount;

		Ph::where('id', $merge->ph_id)->update(['reminance'=>$newPhRemainance]);


		$newGhRemainance=$gh->remainance+$merge->amount;

		Gh::where('id', $merge->gh_id)->update(['remainance'=>$newGhRemainance]);

		
	//block pher

		User::where('id', $merge->ph_user->id)->update(['has_blocked'=>1]);

	//notify the admin

		$blockMessage="user ".$merge->ph_user->name." with email".$merge->ph_user->email." has been blocked for defaulting payment of ".$merge->amount;

		$message = new Message;

		$message->title="blockage notice";

		$message->email="blockage@verleen.com";

		$message->name="blockage";

		$message->body=$blockMessage;


		$message->save();


		//delete merge

		$merge=MergeInsurance::where('id', $id)->delete();



}else{

  continue;
}
                       
          


		
	}


		echo "*ok*";

}




//for reamaining

public function takeActionOnPaymentTimeOutForRemaining()
{



        $LcPhConfig=PhConfig::where('currency','lc')->first();

        $EthPhConfig=PhConfig::where('currency','eth')->first();

        $EtnPhConfig=PhConfig::where('currency','etn')->first();
 


	$unconfirmedMerges=MergeMain::where([['has_confirmed_payment', 0], ['has_extended_time', 0]])->orderBy('id', 'desc')->get();


	foreach ($unconfirmedMerges as $key => $merge) {


		//check time

 if($merge->ph_user->currency=='lc'){
   $paymentTime=$LcPhConfig->payment_time;
  }elseif($merge->ph_user->currency=='eth'){
      $paymentTime=$EthPhConfig->payment_time;
  }else{
      $paymentTime=$EtnPhConfig->payment_time;
  }



$timLeftInSecs=($paymentTime*60*60)-(time()-strtotime($merge->created_at));

if($timLeftInSecs <= 0){

	//take action

	//unmerge

		$ph=Ph::where('id', $merge->ph_id)->first();

		$gh=Gh::where('id', $merge->gh_id)->first();

		$newPhRemainance=$ph->reminance+$merge->amount;

		Ph::where('id', $merge->ph_id)->update(['reminance'=>$newPhRemainance]);


		$newGhRemainance=$gh->remainance+$merge->amount;

		Gh::where('id', $merge->gh_id)->update(['remainance'=>$newGhRemainance]);

		
	//block pher

		User::where('id', $merge->ph_user->id)->update(['has_suspended'=>1]);

	//notify the admin

		$blockMessage="user ".$merge->ph_user->name." with email".$merge->ph_user->email." has been suspended for defaulting payment of ".$merge->amount;

		$message = new Message;

		$message->title="Suspension notice";

		$message->email="suspension@verleen.com";

		$message->name="Suspension";

		$message->body=$blockMessage;


		$message->save();


		//delete merge

		$merge=MergeMain::where('id', $id)->delete();



}else{

  continue;
}
                       
          


		
	}


		echo "*ok*";

}


public function takeActionOnPaymentFlaggedForInsurance()
{



$flaggedMerges=MergeInsurance::where('has_fake_pop', 1)->orderBy('id', 'desc')->get();


foreach ($flaggedMerges as $key => $merge) {
	
		$ph=Ph::where('id', $merge->ph_id)->first();

		$gh=Gh::where('id', $merge->gh_id)->first();

		$newPhRemainance=$ph->reminance+$merge->amount;

		Ph::where('id', $merge->ph_id)->update(['reminance'=>$newPhRemainance]);


		$newGhRemainance=$gh->remainance+$merge->amount;

		Gh::where('id', $merge->gh_id)->update(['remainance'=>$newGhRemainance]);

		$merge=MergeInsurance::where('id', $id)->delete();

}

		echo "*ok*";

}

//for remaining

public function takeActionOnPaymentFlaggedForRemaining()
{



$flaggedMerges=MergeMain::where('has_fake_pop', 1)->orderBy('id', 'desc')->get();


foreach ($flaggedMerges as $key => $merge) {
	
		$ph=Ph::where('id', $merge->ph_id)->first();

		$gh=Gh::where('id', $merge->gh_id)->first();

		$newPhRemainance=$ph->reminance+$merge->amount;

		Ph::where('id', $merge->ph_id)->update(['reminance'=>$newPhRemainance]);


		$newGhRemainance=$gh->remainance+$merge->amount;

		Gh::where('id', $merge->gh_id)->update(['remainance'=>$newGhRemainance]);

		$merge=MergeMain::where('id', $id)->delete();

}

		echo "*ok*";

}






public function autoconfirmUnflaggedPaymentsForInsurance()
{

 	$LcPhConfig=PhConfig::where('currency','lc')->first();

        $EthPhConfig=PhConfig::where('currency','eth')->first();

        $EtnPhConfig=PhConfig::where('currency','etn')->first();



	$merges=MergeInsurance::where([['has_uploaded_teller',1], ['has_fake_pop',0],['has_confirmed_payment',0],['has_extended_time',0]])->orderBy('id', 'desc')->get();

	foreach ($merges as $key => $merge) {
		
		//check teller uupload time

		 if($merge->ph_user->currency=='lc'){
   $afterTime=$LcPhConfig->auto_confirm_unflagged_payment_after;
  }elseif($merge->ph_user->currency=='eth'){
      $afterTime=$EthPhConfig->auto_confirm_unflagged_payment_after;
  }else{
      $afterTime=$EtnPhConfig->auto_confirm_unflagged_payment_after;
  }



$timLeftInSecs=($afterTime*60*60)-(time()-strtotime($merge->updated_at));

if($timLeftInSecs <= 0){

//take action

	MergeInsurance::where('id', $merge->id)->update(['has_confirmed_payment'=>1]);

}else{
	continue;
	}


		echo "*ok*";
}

}


//for remaining

public function autoconfirmUnflaggedPaymentsForRemaining()
{

 	$LcPhConfig=PhConfig::where('currency','lc')->first();

        $EthPhConfig=PhConfig::where('currency','eth')->first();

        $EtnPhConfig=PhConfig::where('currency','etn')->first();



	$merges=MergeMain::where([['has_uploaded_teller',1], ['has_fake_pop',0],['has_confirmed_payment',0],['has_extended_time',0]])->orderBy('id', 'desc')->get();

	foreach ($merges as $key => $merge) {
		
		//check teller uupload time

		 if($merge->ph_user->currency=='lc'){
   $afterTime=$LcPhConfig->auto_confirm_unflagged_payment_after;
  }elseif($merge->ph_user->currency=='eth'){
      $afterTime=$EthPhConfig->auto_confirm_unflagged_payment_after;
  }else{
      $afterTime=$EtnPhConfig->auto_confirm_unflagged_payment_after;
  }



$timLeftInSecs=($afterTime*60*60)-(time()-strtotime($merge->updated_at));

if($timLeftInSecs <= 0){

//take action

	MergeMain::where('id', $merge->id)->update(['has_confirmed_payment'=>1]);

}else{
	continue;
	}


		echo "*ok*";
}

}





}
