<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\Controller;

use App\User;
use App\Message;


class MessageController extends Controller
{
    //

    public function list()
    {
    	$messages=Message::orderBy('id', 'desc')->paginate(50,['*'],'message_page');

    	$totalMessages=Message::orderBy('id', 'desc')->count();

    	return view('admin.message.list',['messages'=>$messages, 'totalMessages'=>$totalMessages]);
    }

    public function delete($id)
    {
    	Message::where('id', $id)->delete();

    	return Redirect::back()->with('notification', 'Message successfully deleted');
    }


    public function view($id)
    {
    	$message=Message::where('id', $id)->first();

    	return view('admin.message.view',['message'=>$message]);

    }
}
