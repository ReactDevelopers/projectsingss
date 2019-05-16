<?php

namespace App\Http\Middleware;

use Closure;

class TempLogin
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
        $user = \Auth::user();

        if(\Session::get('temp-login') != 'authenticated')
            return redirect('templogin'); // ?redirect='.$request->fullUrl()

        return $next($request);
    }
}
