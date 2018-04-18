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

class StatsController extends Controller
{
    //
    public function index()
    {

    	$totalusers=User::orderBy('id', 'desc')->count();

    	$totalVUsers=User::where('has_verified',1)->count();

    	$totalBUsers=User::where('has_blocked',1)->count();

    	$totalSUsers=User::where('has_suspended',1)->count();

    	///investment

    	$totalLPh=0;

    	$phs=Ph::orderBy('id','desc')->get();

    	foreach ($phs as $key => $ph) {
    		if($ph->user->currency == 'lc')
    		{
    			$totalLPh=$totalLPh+$ph->amount;
    		}else{
    			continue;
    		}
    	}


    	$totalETHPh=0;

    	$phs=Ph::orderBy('id','desc')->get();

    	foreach ($phs as $key => $ph) {
    		if($ph->user->currency == 'eth')
    		{
    			$totalETHPh=$totalETHPh+$ph->amount;
    		}else{
    			continue;
    		}
    	}


    	$totalETNPh=0;

    	$phs=Ph::orderBy('id','desc')->get();

    	foreach ($phs as $key => $ph) {
    		if($ph->user->currency == 'etn')
    		{
    			$totalETNPh=$totalETNPh+$ph->amount;
    		}else{
    			continue;
    		}
    	}



    	$totalLGh=0;

    	$ghs=Gh::orderBy('id','desc')->get();

    	foreach ($ghs as $key => $gh) {
    		if($gh->user->currency == 'lc')
    		{
    			$totalLGh=$totalLGh+$gh->amount;
    		}else{
    			continue;
    		}
    	}


    	$totalETHGh=0;

    	$ghs=Gh::orderBy('id','desc')->get();

    	foreach ($ghs as $key => $gh) {
    		if($gh->user->currency == 'eth')
    		{
    			$totalETHGh=$totalETHGh+$gh->amount;
    		}else{
    			continue;
    		}
    	}

    


    	$totalETNGh=0;

    	$ghs=Gh::orderBy('id','desc')->get();

    	foreach ($ghs as $key => $gh) {
    		if($gh->user->currency == 'etn')
    		{
    			$totalETNGh=$totalETNGh+$gh->amount;
    		}else{
    			continue;
    		}
    	}

  



    	return view('admin.stats.index' ,['totalusers'=>$totalusers,'totalVUsers'=>$totalVUsers,'totalBUsers'=>$totalBUsers,'totalSUsers'=>$totalSUsers,'totalLPh'=>$totalLPh, 'totalLGh'=>$totalLGh,'totalETHPh'=>$totalETHPh,'totalETHGh'=>$totalETHGh,'totalETNPh'=>$totalETNPh,'totalETNGh'=>$totalETNGh]);
    }
}
