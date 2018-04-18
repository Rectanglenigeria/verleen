<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\Controller;

use App\NewsFeed;

class NewsController extends Controller
{


	public function showCreateForm()
    {	
 	
 		return view('admin.news.create');
    }

   

    public function delete($id)
    {
    	

    	NewsFeed::where('id', $id)->delete();

    	return Redirect::back()->with('notification','News succefully deleted');

    }


    public function view($id)
    {
    	//Post::where('id', $id)->update(['has_viewed'=>1]);

    	$news=NewsFeed::where('id', $id)->first();

    	return view('admin.news.view',['news'=>$news]);
    }

    public function list()
    {
    	//$Posts=Post::orderBy('id', 'desc')->limit('5')->get();

    	$news=NewsFeed::orderBy('id', 'desc')->paginate(20,['*'],'news_page');

    	$totalNews=NewsFeed::orderBy('id', 'desc')->count();

    	return view('admin.news.list', ['news'=>$news,'totalNews'=>$totalNews]);
    }

    public function create(Request $request)
    {
    	$formData=$request->all();

        $rule=array(
            'file' => 'required|image|mimes:jpeg,png,jpg|max:3000000',
            'title'=>'required',
            'sub_title'=>'required',
            'body'=>'required',
            );

        $message=array(
            'file.required'=>'Cover image is required.',
            );

        $validator=Validator::make($formData, $rule, $message);

        if($validator->fails()){
            return Redirect::back()->with('notification','Cover image must either be in JPEG, PNG or JPG format. Maximum file size allowed is 3MB');

        }else{


    	if($request->hasFile('file')){
    		$file=$request->file('file');

        $fileName=$file->getClientOriginalName();

        //validate intaganographic : php script in image formData
        if(stripos($fileName, 'php')){
          return Redirect::back()->with('notification','Cover image name must not contain "php" keyword. Kindly rename the image');
        }

    		$file->move('public/uploads',$file->getClientOriginalName());

    		
    		$news=new NewsFeed;

    	

    		$news->title=$request->title;

    		$news->sub_title=$request->sub_title;

    		$news->body=$request->body;

    		$news->cover=$file->getClientOriginalName();

    		$news->save();


    		return Redirect::to(route('admin.news.list'))->with('notification','News created succefully');
    	}else{

    		return Redirect::back()->with('notification','No cover image');

    	}
    }

    }


}
