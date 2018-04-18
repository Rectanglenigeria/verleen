<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\User;

class RedirectIfBlocked
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
       $user=User::where('id', Auth::user()->id)->first();

        if($user->has_blocked==1){

             return Redirect::to(route('user.error.blocked'))->with('notification', "You've been blocked from the system. Contact the admin.");

            

        }else{
            return $next($request);
           
        }
    }
}
