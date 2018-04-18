<?php

namespace App\Http\Controllers\Dashboard;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\Controller;

use App\User;

class ProfileController extends Controller
{
    //
    public function view()
    {

    	return view('dashboard.profile-view');
    }

    public function index()
    {
    	return view('dashboard.profile');
    }

    public function update(Request $request)
    {
    	$formData=$request->all();

        $rule=array(

            'name'=>"required",
            'email'=>'required|email',
            'phone'=>'required|numeric',
            'currency'=>'required',
            'country'=>'required',
            /*'account_name'=>'required',
            'account_no'=>'required|numeric',
            'bank'=>'required',
            'wallet_address'=>'required',
            'wallet_name'=>'required' */
            
            );

        $message=array(
            
            'name.required'=>'This field is required'
            );

        $validator=Validator::make($formData, $rule, $message);

        if($validator->fails()){
            return Redirect::to(route('user.profile'))->withErrors($validator)->withInput();

        }else{

        	User::where('id', Auth::user()->id)->update(['name'=>$request->name, 'email'=>$request->email, 'phone'=>$request->phone, 'currency'=>$request->currency, 'account_name'=>$request->account_name, 'account_no'=>$request->account_no, 'bank'=>$request->bank, 'wallet_name'=>$request->wallet_name, 'wallet_address'=>$request->wallet_address, 'country'=>$request->country]);

    	return Redirect::to(route('home'))->with('notification','Profile successfully updated');

    	}

    }
}
