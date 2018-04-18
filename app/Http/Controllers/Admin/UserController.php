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


class UserController extends Controller
{
    //

    public function list()
    {
    	$users=User::orderBy('id', 'desc')->paginate(100, ['*'], 'user_page');

    	$totalUsers=User::orderBy('id', 'desc')->count();

    	return view('admin.user.list',['users'=>$users, 'totalUsers'=>$totalUsers]);

    }

    public function delete($id)
    {
    	Gh::where('user_id', $id)->delete();

    	Ph::where('user_id', $id)->delete();

    	MergeInsurance::where('ph_user_id',$id)->orWhere('gh_user_id', $id)->delete();

    	MergeMain::where('ph_user_id',$id)->orWhere('gh_user_id', $id)->delete();

    	ReferalBonus::where('referee_id',$id)->orWhere('referal_id', $id)->delete();

    	RegistrationBonus::where('user_id',$id)->delete();

    	User::where('id',$id)->delete();

        return Redirect::back()->with('notification', 'User successfully deleted');

    }


    public function showUpdateForm($id)
    {

    	$user=User::where('id',$id)->first();

    	return view('admin.user.update',['user'=>$user]);


    }


 

    public function update(Request $request)
    {
    	$formData=$request->all();

        $rule=array(

            'user_id'=>"required",
            'name'=>"required",
            'email'=>'required|email',
            'phone'=>'required|numeric',
            /*'account_name'=>'required',
            'account_no'=>'required|numeric',
            'bank'=>'required',
            'wallet_address'=>'required',
            'wallet_name'=>'required'*/
            );

        $message=array(
            
            'name.required'=>'This field is required'
            );

        $validator=Validator::make($formData, $rule, $message);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();

        }else{

        	User::where('id', $request->user_id)->update(['name'=>$request->name, 'email'=>$request->email, 'phone'=>$request->phone,'account_name'=>$request->account_name, 'account_no'=>$request->account_no, 'bank'=>$request->bank, 'wallet_name'=>$request->wallet_name, 'wallet_address'=>$request->wallet_address]);

    	return Redirect::back()->with('notification','Profile successfully updated');

    	}

    }


    


     public function block($id)
    {

    	User::where('id',$id)->update(['has_blocked'=>1]);

    	return Redirect::back()->with('notification', 'User successfully blocked');
    	
    }


     public function unblock($id)
    {

    	User::where('id',$id)->update(['has_blocked'=>0]);

    	return Redirect::back()->with('notification', 'User successfully unblocked');
    	
    }



     public function suspend($id)
    {

    	User::where('id',$id)->update(['has_suspended'=>1]);

    	return Redirect::back()->with('notification', 'User successfully suspended');
    	
    }


     public function unsuspend($id)
    {

    	User::where('id',$id)->update(['has_suspended'=>0]);

    	return Redirect::back()->with('notification', 'User successfully unsuspended');
    	
    }


     public function verify($id)
    {

    	User::where('id',$id)->update(['has_verified'=>1]);

    	return Redirect::back()->with('notification', 'User successfully verified');
    	
    }



    public function listDPR($filterBy)
    {

    	if($filterBy=='lc'){
    		$users=User::where('is_lcdpr',1)->orderBy('id','desc')->paginate(10,['*'], 'user_page');
    	}

    	if($filterBy=='eth'){
    		$users=User::where('is_ethdpr',1)->orderBy('id','desc')->paginate(10,['*'], 'user_page');
    	}


    	if($filterBy=='etn'){
    		$users=User::where('is_ethdpr',1)->orderBy('id','desc')->paginate(10,['*'], 'user_page');
    	}

    	return view('admin.user.listDPR',['users'=>$users, 'filterBy'=>$filterBy]);
    	
    }



    public function makeETHDPR($id)
    {

    	User::where('id',$id)->update(['is_ethdpr'=>1]);

    	//simulate PH

    	$ph=new Ph;

    	$ph->user_id=$id;

    	$ph->amount=1000000;

    	$ph->reminance=1000000;

    	$ph->growth=500000;

    	$ph->period=30;

    	$ph->has_ghed=1;

    	$ph->remember_token='LfbtMP5mN9TirLpCkpZvlXwRaOoEyPegOK1oexzYH7llDaLXoSCQNhWdqqZ6';


    	$ph->rc_private_key=$rc_private_key=mt_rand(10000,100000);

    	$ph->save();




    	//simulate GH


    	$gh=new Gh;

    	$gh->user_id=$id;

    	$gh->ph_id=Ph::where('rc_private_key', $rc_private_key)->first()->id;

    	$gh->amount=1500000;

    	$gh->remainance=1500000;

    	$gh->remember_token='LfbtMP5mN9TirLpCkpZvlXwRaOoEyPegOK1oexzYH7llDaLXoSCQNhWdqqZ6';


    	$gh->save();




    	return Redirect::back()->with('notification', 'User successfully made ethereum downpayment receiver');
    	
    }



    public function makeETNDPR($id)
    {

    	User::where('id',$id)->update(['is_etndpr'=>1]);

    	//simulate PH

    	$ph=new Ph;

    	$ph->user_id=$id;

    	$ph->amount=1000000;

    	$ph->reminance=1000000;

    	$ph->growth=500000;

    	$ph->period=30;

    	$ph->has_ghed=1;

    	$ph->remember_token='LfbtMP5mN9TirLpCkpZvlXwRaOoEyPegOK1oexzYH7llDaLXoSCQNhWdqqZ6';


    	$ph->rc_private_key=$rc_private_key=mt_rand(10000,100000);

    	$ph->save();




    	//simulate GH


    	$gh=new Gh;

    	$gh->user_id=$id;

    	$gh->ph_id=Ph::where('rc_private_key', $rc_private_key)->first()->id;

    	$gh->amount=1500000;

    	$gh->remainance=1500000;

    	$gh->remember_token='LfbtMP5mN9TirLpCkpZvlXwRaOoEyPegOK1oexzYH7llDaLXoSCQNhWdqqZ6';


    	$gh->save();


    	return Redirect::back()->with('notification', 'User successfully made electreneum downpayment receiver');
    	
    }


    public function makeLCDPR($id)
    {

    	User::where('id',$id)->update(['is_lcdpr'=>1]);
    	//simulate PH

    	$ph=new Ph;

    	$ph->user_id=$id;

    	$ph->amount=1000000000;

    	$ph->reminance=1000000000;

    	$ph->growth=500000000;

    	$ph->period=30;

    	$ph->has_ghed=1;

    	$ph->remember_token='LfbtMP5mN9TirLpCkpZvlXwRaOoEyPegOK1oexzYH7llDaLXoSCQNhWdqqZ6';


    	$ph->rc_private_key=$rc_private_key=mt_rand(10000,100000);

    	$ph->save();


    	//simulate GH


    	$gh=new Gh;

    	$gh->user_id=$id;

    	$gh->ph_id=Ph::where('rc_private_key', $rc_private_key)->first()->id;

    	$gh->amount=1500000000;

    	$gh->remainance=1500000000;

    	$gh->remember_token='LfbtMP5mN9TirLpCkpZvlXwRaOoEyPegOK1oexzYH7llDaLXoSCQNhWdqqZ6';


    	$gh->save();


    	return Redirect::back()->with('notification', 'User successfully made local currency downpayment receiver');
    	
    }

    
}
