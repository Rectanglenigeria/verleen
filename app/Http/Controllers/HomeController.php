<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\Controller;

use App\Testimony;

use App\Message;

use App\Config;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function showTestimonies()
    {
        $testimonies=Testimony::orderBy('id', 'desc')->paginate('10');

        $config=Config::orderBy('id', 'asc')->first();

        return view('testimonies',['testimonies'=>$testimonies,'config'=>$config]);
    }




     public function showContactForm()
    {
        $config=Config::orderBy('id', 'asc')->first();

        return view('contact-us', ['config'=>$config]);
    }


     public function about()
    {
        $config=Config::orderBy('id', 'asc')->first();

        return view('about-us', ['config'=>$config]);
    }

     public function hiw()
    {
        $config=Config::orderBy('id', 'asc')->first();

        return view('how-it-works', ['config'=>$config]);
    }

     public function faqs()
    {
        $config=Config::orderBy('id', 'asc')->first();

        return view('faqs', ['config'=>$config]);
    }



     public function submitContactForm(Request $request)
    {


          $formData=$request->all();

        $rule=array(
            
            'name'=>'required',

             'email'=>"required",

             'message'=>'required',
            );

        $message=array(
            
            'name.desc'=>'This field is required'
            );

        $validator=Validator::make($formData, $rule, $message);

        if($validator->fails()){
            return Redirect::to(route('contact-us'))->withErrors($validator)->withInput();

        }else{

        $saveMessage=new Message;

        $saveMessage->name=$request->name;

        $saveMessage->email=$request->email;

        $saveMessage->body=$request->message;

        $saveMessage->remember_token=$request->_token;

        $saveMessage->save();

        return Redirect::back()->with('notification', 'Messaged received. It will be processed shortly. Thanks.');

        }
          
    }
   
}
