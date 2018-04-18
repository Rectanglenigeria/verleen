<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\Controller;

use App\Testimony;

class TestimonyController extends Controller
{
    //

    //

    public function showCreateForm()
    {	

    	return view('admin.testimony.create');
    }

    public function list()
    {
    	$Testimonies=Testimony::orderBy('id', 'desc')->get();

    	return view('admin.testimony.list', ['Testimonies'=>$Testimonies]);
    }

    public function delete($id)
    {

    	Testimony::where('id', $id)->delete();

    	return Redirect::back()->with('notification','Testimony succefully deleted');

    }


  public function approve($id)
    {

    	Testimony::where('id', $id)->update(['has_approved'=>1]);

    	return Redirect::back()->with('notification','Testimony succefully approved');

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
            return Redirect::to(route('admin.testimony.create'))->withErrors($validator)->withInput();

        }else{

        $testimony=new Testimony;

        $testimony->name=$request->name;

        $testimony->email=$request->email;

        $testimony->body=$request->body;

        $testimony->remember_token=$request->_token;

        $testimony->save();

    	return Redirect::to(route('admin.testimony.list'))->with('notification', 'Testimony created successfully');

    	}

    	
    }
}

