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


class AdminLoginController extends Controller
{
    //


    public function showLoginForm()
    {
    	return view('auth.admin-login');
    }


    public function login(Request $request)
    {
    	$this->validate($request,[

    		'email'=>'required',
    		'password'=>'required|min:6'
    	]);

    	if(Auth::guard('admin')->attempt(['email'=>$request->email, 'password'=>$request->password], $request->remember)){

    		//return redirect(route('admin.home'))->with('notification','You are logged in as '.$request->email);;

    		return redirect()->intended(route('admin.home'))->with('notification','You are logged in as '.$request->email);
    	}

    	return redirect()->back()->withInput($request->only('email','remember'));

    }


   public function logout(Request $request)
   {
		$this->guard('admin')->logout();

        $request->session()->invalidate();

        return redirect('admin.login');

   }

}

