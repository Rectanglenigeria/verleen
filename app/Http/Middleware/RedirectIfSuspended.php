<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\User;

class RedirectIfSuspended
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

        if($user->has_suspended==1){

             return Redirect::to(route('user.error.suspended'))->with('notification', "You've been suspended from the system. Contact the admin.");

            

        }else{
            return $next($request);
           
        }
    }
}
