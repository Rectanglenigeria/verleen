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
use App\NewsFeed;
use App\Testimony;
use App\PhConfig;
use App\Ggp;



class MergeController extends Controller
{
    //

    public function viewImergeDetailsPher($id)
    {

    	$detail=MergeInsurance::where('id', $id)->first();

    	return view('dashboard.merges.imergedetailspher', ['detail'=>$detail]);

    }

    //for remaining

    public function RviewImergeDetailsPher($id)
    {

    	$detail=MergeMain::where('id', $id)->first();

    	return view('dashboard.merges.rimergedetailspher', ['detail'=>$detail]);

    }


    public function viewImergeDetailsGher($id)
    {

    	$detail=MergeInsurance::where('id', $id)->first();

    	return view('dashboard.merges.imergedetailsgher', ['detail'=>$detail]);
    	
    }

    //for remaining

     public function RviewImergeDetailsGher($id)
    {

    	$detail=MergeMain::where('id', $id)->first();

    	return view('dashboard.merges.rimergedetailsgher', ['detail'=>$detail]);
    	
    }


    public function flagInsurance($id)
    {

    	MergeInsurance::where('id', $id)->update(['has_fake_pop'=>1]);

    	return Redirect::back()->with('notification','Teller flagged successfully');
    	
    }

    //for remaining

     public function flagRemaining($id)
    {

    	MergeMain::where('id', $id)->update(['has_fake_pop'=>1]);

    	return Redirect::back()->with('notification','Teller flagged successfully');
    	
    }


    public function extendTimeForInsurance($id)
    {
    	MergeInsurance::where('id', $id)->update(['has_extended_time'=>1]);

    	return Redirect::back()->with('notification','Time extended successfully');
    	
    }

    //for remaining

     public function extendTimeForRemaining($id)
    {
    	MergeMain::where('id', $id)->update(['has_extended_time'=>1]);

    	return Redirect::back()->with('notification','Time extended successfully');
    	
    }



public function ggpPick($id)
    {

    	$fromGGP=Ggp::where('id', $id)->first();



    	//merge

    	//delete ggp


    	 //merge downpayment

                //get dpr gh

                $gh=Gh::where('user_id', $fromGGP->gh_user->id)->first();

                $ph=Ph::where('user_id', Auth::user()->id)->orderBy('id', 'desc')->first();


                if(empty($ph)){

                	return Redirect::back()->with('notification','You do not have an any active PH');

                }else{




                if($gh->remainance==0){

                	return Redirect::back()->with('notification','User has been merged by admin');

                }else{
                //merge 

                	// test for valid active ph and paid downpayment

                	 if(!isset($ph->insurance_merge->id)){

                	 	//ph yet to be merged for downpayment
                	 	return Redirect::back()->with('notification','No downpayment made');

                }else{



                	if($ph->insurance_merge->has_confirmed_payment==0){

                		//yet to fulfill downpayment
                		return Redirect::back()->with('notification','Yet to fulfill downpayment');



                	}else{


                		//



                	if($ph->reminance-$fromGGP->amount < 0){

                		return Redirect::back()->with('notification','GGP amount is greater than your payin');

                	}else{



                $amount=$fromGGP->amount;



            //update insurance merge table
                //populate all fields

          

            $merge = new MergeMain;

            $merge->ph_user_id=$ph->user->id;

            $merge->gh_user_id=$gh->user->id;

            $merge->ph_id=$ph->id;

            $merge->gh_id=$gh->id;

            $merge->amount=$amount;


            if($ph->user->currency=='eth' || $ph->user->currency=='etn')
            {
                $merge->is_crypto=1;
            }

            $merge->save();




            //update ph table
               //update reminance

                $ph_remainance=$ph->reminance-$amount;
                
                Ph::where('id', $ph->id)->update(['reminance'=>$ph_remainance]);    

            //update gh table
                //update remainance

                $gh_remainance=$gh->remainance-$amount;
                
                Gh::where('id', $gh->id)->update(['remainance'=>$gh_remainance]);


                //delete ggp

                Ggp::where('id', $id)->delete();

                return Redirect::back()->with('notification','You successfully picked a GGP and have been merged.');




                }
		

		}

	}

	}

		}

    	
    }



public function defaultRemaining($id)
{
		//unmerge

		$merge=MergeMain::where('id', $id)->first();

		$ph=Ph::where('id', $merge->ph_id)->first();

		$gh=Gh::where('id', $merge->gh_id)->first();

		$newPhRemainance=$ph->reminance+$merge->amount;

		Ph::where('id', $merge->ph_id)->update(['reminance'=>$newPhRemainance]);

		$newGhRemainance=$gh->remainance+$merge->amount;

		Gh::where('id', $merge->gh_id)->update(['remainance'=>$newGhRemainance]);


		//add GH to GGPS

		$ggp=new Ggp;

		$ggp->ph_user_id=$ph->user->id;

		$ggp->gh_user_id=$gh->user->id;

		$ggp->ph_id=$ph->id;

		$ggp->gh_id=$gh->id;

		$ggp->amount=$merge->amount;

		$ggp->is_remaining=1;

		if($ph->user->currency=='eth' || $ph->user->currency=='eth'){
			$ggp->is_crypto=1;
		}

		$ggp->save();

		//block ph user

		User::where('id', $ph->user->id)->update(['has_suspended'=>1]);

		//delete merge

		$merge=MergeMain::where('id', $id)->delete();


    	return Redirect::back()->with('notification','Action successful');

}



public function defaultInsurance($id)
{
		//unmerge

		$merge=MergeInsurance::where('id', $id)->first();

		$ph=Ph::where('id', $merge->ph_id)->first();

		$gh=Gh::where('id', $merge->gh_id)->first();

		$newPhRemainance=$ph->reminance+$merge->amount;

		Ph::where('id', $merge->ph_id)->update(['reminance'=>$newPhRemainance]);

		$newGhRemainance=$gh->remainance+$merge->amount;

		Gh::where('id', $merge->gh_id)->update(['remainance'=>$newGhRemainance]);


		//add GH to GGPS

		$ggp=new Ggp;

		$ggp->ph_user_id=$ph->user->id;

		$ggp->gh_user_id=$gh->user->id;

		$ggp->ph_id=$ph->id;

		$ggp->gh_id=$gh->id;

		$ggp->amount=$merge->amount;

		$ggp->is_insurance=1;

		if($ph->user->currency=='eth' || $ph->user->currency=='eth'){
			$ggp->is_crypto=1;
		}

		$ggp->save();

		//block ph user

		User::where('id', $ph->user->id)->update(['has_suspended'=>1]);

		//delete merge

		$merge=MergeInsurance::where('id', $id)->delete();


    	return Redirect::back()->with('notification','Action successful');

}




    public function confirmInsurance($id)
    {

    	MergeInsurance::where('id', $id)->update(['has_confirmed_payment'=>1]);

    	return Redirect::back()->with('notification','Payment confirmed successfully');
    	
    }

//for remaining

    public function confirmRemaining($id)
    {

    	MergeMain::where('id', $id)->update(['has_confirmed_payment'=>1]);

    	return Redirect::back()->with('notification','Payment confirmed successfully');
    	
    }


    public function uploadTeller(Request $request)
    {


    	$formData=$request->all();

        $rule=array(
            'file' => 'required|image|mimes:jpeg,png,jpg|max:3000000'
            );

        $message=array(
            'file.required'=>'Teller is required.',
            );

        $validator=Validator::make($formData, $rule, $message);

        if($validator->fails()){
            return Redirect::to(back())->withErrors($validator)->withInput();

        }else{


    	if($request->hasFile('file')){
    		$file=$request->file('file');

        $fileName=$file->getClientOriginalName();

        //validate intaganographic : php script in image formData
        if(stripos($fileName, 'php')){
          return Redirect::to(back())->with('notification','Teller name must not contain "php" keyword. Kindly rename the teller');
        }

    		$file->move('public/uploads',$file->getClientOriginalName());


    	MergeInsurance::where('id', $request->merge_id)->update(['has_uploaded_teller'=>1, 'teller'=>$file->getClientOriginalName()]);

   

    	return Redirect::back()->with('notification','Teller uploaded successfully');

    	

    	}

      }
    	
    }




    //for remaining

     public function uploadTellerForRemaining(Request $request)
    {


    	$formData=$request->all();

        $rule=array(
            'file' => 'required|image|mimes:jpeg,png,jpg|max:3000000'
            );

        $message=array(
            'file.required'=>'Teller is required.',
            );

        $validator=Validator::make($formData, $rule, $message);

        if($validator->fails()){
            return Redirect::to(back())->withErrors($validator)->withInput();

        }else{


    	if($request->hasFile('file')){
    		$file=$request->file('file');

        $fileName=$file->getClientOriginalName();

        //validate intaganographic : php script in image formData
        if(stripos($fileName, 'php')){
          return Redirect::to(back())->with('notification','Teller name must not contain "php" keyword. Kindly rename the teller');
        }

    		$file->move('public/uploads',$file->getClientOriginalName());


    	MergeMain::where('id', $request->merge_id)->update(['has_uploaded_teller'=>1, 'teller'=>$file->getClientOriginalName()]);

   

    	return Redirect::back()->with('notification','Teller uploaded successfully');

    	

    	}

      }
    	
    }



    public function uploadHash(Request $request)
    {

    	MergeInsurance::where('id', $request->merge_id)->update(['has_uploaded_teller'=>1, 'payment_hash'=>$request->hash]);

    	$detail=MergeInsurance::where('id', $request->merge_id)->first();

    	return Redirect::back()->with('notification','Payment hash uploaded successfully');
    	
    }

    //for remaining

    public function uploadHashRemaining(Request $request)
    {

    	MergeMain::where('id', $request->merge_id)->update(['has_uploaded_teller'=>1, 'payment_hash'=>$request->hash]);

    	$detail=MergeMain::where('id', $request->merge_id)->first();

    	return Redirect::back()->with('notification','Payment hash uploaded successfully');
    	
    }
}
