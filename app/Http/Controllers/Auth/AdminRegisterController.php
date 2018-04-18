<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Support\Facades\Auth;
class AdminRegisterController extends Controller
{
    //

    public function showRegisterForm()
    {

    	return view('auth.admin-register');
    }

    public  function register(Request $request)
    {

    	$formData=$request->all();

        $rule=array(
            
            'email'=>'required|email',

             'password'=>"required|min:6|confirmed",
            
            'role'=>"required",

            'name'=>"required",
            );

        $message=array(
            
            'role.required'=>'This field is required'
            );

        $validator=Validator::make($formData, $rule, $message);

        if($validator->fails()){
            return Redirect::to(route('admin.register'))->withErrors($validator)->withInput();

        }else{

        $admin=new Admin;

        $admin->name=$request->name;

        $admin->email=$request->email;

        $admin->password=Hash::make($request->password);

        $admin->role=$request->role;

        $admin->remember_token=$request->_token;

        $admin->save();

    	return Redirect::back()->with('notification','Admin user successfully created');

    	}

    	
    }
}
