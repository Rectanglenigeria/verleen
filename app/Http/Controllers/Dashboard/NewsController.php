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

use App\MergeInsurance;

use App\MergeMain;

use App\NewsFeed;

class NewsController extends Controller
{
    public function list()
    {
    	$NewsFeeds=NewsFeed::orderBy('id', 'desc')->paginate(20);

    	return view('dashboard.news.list',['NewsFeeds'=>$NewsFeeds]);
    }

    public function view($id)
    {
    	$news=NewsFeed::where('id', $id)->first();

    	return view('dashboard.news.view',['news'=>$news]);
    }
}
