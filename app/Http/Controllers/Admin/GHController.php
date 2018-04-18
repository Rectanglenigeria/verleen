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


class GHController extends Controller
{
    //

     //

    public function list($filterBy)
    {
    	if($filterBy=='local')
    	{
    		$ghs=Gh::orderBy('id','desc')->paginate(100,['*'],'gh_page');

    		return view('admin.gh.list',['ghs'=>$ghs,'filterBy'=>$filterBy]);

    	}elseif($filterBy=="eth")
    	{
    		$ghs=Gh::orderBy('id','desc')->paginate(100,['*'],'gh_page');

    		return view('admin.gh.list',['ghs'=>$ghs,'filterBy'=>$filterBy]);

    	}else{

    		$ghs=Gh::orderBy('id','desc')->paginate(100,['*'],'gh_page');

    		return view('admin.gh.list',['ghs'=>$ghs,'filterBy'=>$filterBy]);

    	}
    }


    public function view($id)
    {
    	$gh=Gh::where('id', $id)->first();

    	return view('admin.gh.view', ['gh'=>$gh]);
    }
}
