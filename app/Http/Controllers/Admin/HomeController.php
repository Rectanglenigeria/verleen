<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\Controller;

use App\User;



class HomeController extends Controller
{
    //

    public function index()
    {
    	$users=User::orderBy('id', 'desc')->limit('10')->get();

    	return view('admin.home', ['users'=>$users]);
    }


   

    
}
