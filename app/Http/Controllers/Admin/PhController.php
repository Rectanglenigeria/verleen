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

class PhController extends Controller
{
    //

    public function list($filterBy)
    {
    	if($filterBy=='local')
    	{
    		$phs=Ph::orderBy('id','desc')->paginate(100,['*'],'ph_page');

    		return view('admin.ph.list',['phs'=>$phs,'filterBy'=>$filterBy]);

    	}elseif($filterBy=="eth")
    	{
    		$phs=Ph::orderBy('id','desc')->paginate(100,['*'],'ph_page');

    		return view('admin.ph.list',['phs'=>$phs,'filterBy'=>$filterBy]);

    	}else{

    		$phs=Ph::orderBy('id','desc')->paginate(100,['*'],'ph_page');

    		return view('admin.ph.list',['phs'=>$phs,'filterBy'=>$filterBy]);

    	}
    }


    public function view($id)
    {
    	$ph=Ph::where('id', $id)->first();

    	return view('admin.ph.view', ['ph'=>$ph]);
    }
}
