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

use App\Config;

class WalletController extends Controller
{
    //
    public function view()
    {
    	$config=Config::where('id',1)->first();

    	$Phs=Ph::where('user_id', Auth::user()->id)->orderBy('id','desc')->paginate(20);

    	return view('dashboard.wallet.view',['phs'=>$Phs, 'config'=>$config]);
    }
}
