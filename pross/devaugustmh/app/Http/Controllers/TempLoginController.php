<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Http\Requests;

class TempLoginController extends Controller
{
    public function login(Request $request)
    {
        $redirectTo = '';
        
    	if(Session::get('temp-login') == 'authenticated'){
            $redirectTo = !empty($request->redirect)? $request->redirect : '/';
    		return redirect($redirectTo);
        }

    	return view('temp-login');
    }

    public function auth(Request $request)
    {

        if($request->email == 'nh8to9' && $request->password == '8goto9'){
            Session::put('temp-login', 'authenticated');
            return redirect('/');
        }

        return redirect('templogin')->with('error', 'Credentials do not match.');
    } 
}
