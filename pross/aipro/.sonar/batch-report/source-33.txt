<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;

class UserAuth
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
        if(Auth::check()){
            if(Auth::user() && Auth::user()->user_type!='company')
                return redirect('login');
            else
                return $next($request);     
        } 
        return redirect('login');
    }

    protected function validator(array $data) {         
        $validator = Validator::make($data, [
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|confirmed|min:6',
        ]);
        
        return $validator;
    }
}
