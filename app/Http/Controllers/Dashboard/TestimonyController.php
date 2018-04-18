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

use App\MergeInsurance;

use App\MergeMain;

use App\NewsFeed;

use App\Testimony;

class TestimonyController extends Controller
{
    //
    public function showCreateForm()
    {	
    	return view('dashboard.testimony.create');
    }


    public function view()
    {
    	$testimonies=Testimony::orderBy('id', 'desc')->paginate(20);

    	return view('dashboard.testimony.list',['testimonies'=>$testimonies]);
    }

    public function create(Request $request)
    {
    	$formData=$request->all();

        $rule=array(
            
            'name'=>'required',

            'email'=>'required',

            'body'=>"required",
            );

        $message=array(
            
            'body.required'=>'This field is required'
            );

        $validator=Validator::make($formData, $rule, $message);

        if($validator->fails()){
            return Redirect::to(route('user.testimony.create'))->withErrors($validator)->withInput();

        }else{

        $testimony=new Testimony;

        $testimony->name=$request->name;

        $testimony->email=$request->email;

        $testimony->body=$request->body;

        $testimony->remember_token=$request->_token;

        $testimony->save();

    	return Redirect::to(route('user.testimony.view'))->with('notification', 'Testimony created successfully');

    	}
    }
}
