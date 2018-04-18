<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Admin;

class RedirectIfNotSuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $admin=Admin::where('id', Auth::guard('admin')->user()->id)->first();

        if($admin->role==1){

            return $next($request);

        }else{

            return Redirect::to(route('admin.home'))->with('notification', "Access denied.");
        }
    }



}
