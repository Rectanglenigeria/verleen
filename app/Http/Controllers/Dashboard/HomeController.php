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
use App\Gh;
use App\MergeInsurance;
use App\MergeMain;
use App\NewsFeed;
use App\Testimony;
use App\PhConfig;

use App\Ggp;


class HomeController extends Controller
{
    //


    public function index()
    {
    	$testimonies=Testimony::where('has_approved', 1)->orderBy('id','desc')->limit('6')->get();

    	$insurance_merges=MergeInsurance::where('ph_user_id', Auth::user()->id)->orWhere('gh_user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(20 ,['*'], 'insurance_merge');

    	$main_merges=MergeMain::where('ph_user_id', Auth::user()->id)->orWhere('gh_user_id', Auth::user()->id)->orderBy('id', 'desc')->paginate(20 ,['*'], 'main_merge');

    	$NewsFeeds=NewsFeed::orderBy('id', 'desc')->paginate(10, ['*'], 'news_page');

    	

    	$local_trans=MergeMain::where([['ph_user_id', Auth::user()->id],['has_confirmed_payment', 1]])->orWhere([['gh_user_id', Auth::user()->id],['has_confirmed_payment',1]])->orderBy('id', 'desc')->paginate(20 ,['*'], 'local_trans');

    	$global_trans=MergeMain::where('has_confirmed_payment', 1)->orderBy('id', 'desc')->paginate(20 ,['*'], 'global_trans');

        $global_phs=Ph::orderBy('id', 'desc')->paginate(5,['*'], 'global_ph');


        //just added

        $LcPhConfig=PhConfig::where('currency','lc')->first();

        $EthPhConfig=PhConfig::where('currency','eth')->first();

        $EtnPhConfig=PhConfig::where('currency','etn')->first();
        //just added


        $ggps=Ggp::orderBy('id', 'desc')->get();



    	return view('dashboard.index', ['testimonies'=>$testimonies, 'NewsFeeds'=>$NewsFeeds, 'insurance_merges'=>$insurance_merges, 'main_merges'=>$main_merges, 'global_trans'=>$global_trans, 'local_trans'=>$local_trans, 'LcPhConfig'=>$LcPhConfig, 'EthPhConfig'=>$EthPhConfig,'EthPhConfig'=>$EthPhConfig,'ggps'=>$ggps, 'global_phs'=>$global_phs]);
    }
}
