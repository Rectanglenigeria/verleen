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
class ConfigController extends Controller
{
    //

    public function showFormLC()
    {
    	$config=PhConfig::where('currency', 'lc')->first();

    	return view('admin.config.lc.form', ['config'=>$config]);
    }


     public function showFormETH()
    {
    	$config=PhConfig::where('currency', 'eth')->first();

    	return view('admin.config.eth.form', ['config'=>$config]);
    }


    public function showFormETN()
    {
    	$config=PhConfig::where('currency', 'etn')->first();

    	return view('admin.config.etn.form', ['config'=>$config]);
    }


    public function updateLC(Request $request)
    {
    	$formData=$request->all();

        $rule=array(
           
            'min_ph_value'=>'required|numeric',

             'max_ph_value'=>'required|numeric',

              'roi_value'=>'required|numeric',

                   'ph_multiple'=>'required|numeric',

                   'roi_period'=>'required|numeric',

                   'ph_per_time'=>'required|numeric',

                    'downpayment'=>'required|numeric',

                   'payment_time'=>'required|numeric',


                   'autoconfirm_unflagged_payment_after'=>'required|numeric',

                   
           
         
            );

        $message=array(
            'payment_time.required'=>'This field is required.',
            );

        $validator=Validator::make($formData, $rule, $message);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();

        }else{


        	//update config

        	PhConfig::where('currency', 'lc')->update([
        		'min_ph_value'=>$request->min_ph_value,
        		'max_ph_value'=>$request->max_ph_value,
        		'roi_value'=>$request->roi_value,
        		'ph_multiple'=>$request->ph_multiple,
        		'roi_period'=>$request->roi_period,
        		'ph_pertime'=>$request->ph_per_time,
        		'downpayment'=>$request->downpayment,
        		'payment_time'=>$request->payment_time,
        		'autoconfirm_unflagged_payment_after'=>$request->autoconfirm_unflagged_payment_after,

        	]);
    }


     return Redirect::back()->with('notification','Successfully updated');


    }




    public function updateETH(Request $request)
    {
    	$formData=$request->all();

        $rule=array(
           
            'min_ph_value'=>'required|numeric',

             'max_ph_value'=>'required|numeric',

              'roi_value'=>'required|numeric',

                   'ph_multiple'=>'required|numeric',

                   'roi_period'=>'required|numeric',

                   'ph_per_time'=>'required|numeric',

                    'downpayment'=>'required|numeric',

                   'payment_time'=>'required|numeric',


                   'autoconfirm_unflagged_payment_after'=>'required|numeric',

                   
           
         
            );

        $message=array(
            'payment_time.required'=>'This field is required.',
            );

        $validator=Validator::make($formData, $rule, $message);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();

        }else{


        	//update config

        	PhConfig::where('currency', 'eth')->update([
        		'min_ph_value'=>$request->min_ph_value,
        		'max_ph_value'=>$request->max_ph_value,
        		'roi_value'=>$request->roi_value,
        		'ph_multiple'=>$request->ph_multiple,
        		'roi_period'=>$request->roi_period,
        		'ph_pertime'=>$request->ph_per_time,
        		'downpayment'=>$request->downpayment,
        		'payment_time'=>$request->payment_time,
        		'autoconfirm_unflagged_payment_after'=>$request->autoconfirm_unflagged_payment_after,

        	]);
    }


     return Redirect::back()->with('notification','Successfully updated');


    }


    public function updateETN(Request $request)
    {
    	$formData=$request->all();

        $rule=array(
           
            'min_ph_value'=>'required|numeric',

             'max_ph_value'=>'required|numeric',

              'roi_value'=>'required|numeric',

                   'ph_multiple'=>'required|numeric',

                   'roi_period'=>'required|numeric',

                   'ph_per_time'=>'required|numeric',

                    'downpayment'=>'required|numeric',

                   'payment_time'=>'required|numeric',


                   'autoconfirm_unflagged_payment_after'=>'required|numeric',

                   
           
         
            );

        $message=array(
            'payment_time.required'=>'This field is required.',
            );

        $validator=Validator::make($formData, $rule, $message);

        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();

        }else{


        	//update config

        	PhConfig::where('currency', 'etn')->update([
        		'min_ph_value'=>$request->min_ph_value,
        		'max_ph_value'=>$request->max_ph_value,
        		'roi_value'=>$request->roi_value,
        		'ph_multiple'=>$request->ph_multiple,
        		'roi_period'=>$request->roi_period,
        		'ph_pertime'=>$request->ph_per_time,
        		'downpayment'=>$request->downpayment,
        		'payment_time'=>$request->payment_time,
        		'autoconfirm_unflagged_payment_after'=>$request->autoconfirm_unflagged_payment_after,

        	]);
    }


     return Redirect::back()->with('notification','Successfully updated');


    }




  



}
