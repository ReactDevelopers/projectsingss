<?php

namespace App\Http\Middleware;

use Closure;
// use Auth;

class AdminAuth
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
                    // dd(\Auth::user());
        if(\Auth::check())
        {
            // dd(Auth::user());
            // if(\Auth::user())
            //     return redirect('login');
            


                return $next($request);     
        } 
        else 
        {
            return redirect('login');    
        }
    }
}
