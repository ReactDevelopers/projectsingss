<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

use Illuminate\Support\Facades\Auth;
use App\Models\Users;
use Illuminate\Support\Facades\Redirect;

use App\Models\Settings;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    //login view page
    public function index()
    {
        // if(\Auth::check())
        // {
            // dd(Auth::user());
            if(\Auth::user()){
                return redirect('admin/dashboard');
            }
        // }
        else
        return view('login'); 
    }

    //check login 
    public function checklogin(Request $request)
    {
    $validator = \Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:6',
        ], [], [
            'email.required' => 'Please enter email.',
            'min.required' => 'Please enter min 5.',
        ]);

        //error thrower
        if ($validator->fails()) 
        { 
            return redirect()->back()->withErrors($validator, 'feature1')->withInput();
        } 
    //matching data inputted with data
        else 
        {   
            if (\Auth::attempt(['email' => $request->email, 'password' => $request->password])) 
            { 
               //dd('correct');
               return redirect('admin/dashboard');     
            }
            else
            {
                // dd('wrong');
                return redirect('admin')->with('error','Invalid E-mail/Password!');
                // \Session::flash('message', "Invalid E-mail/Password!");
                // return Redirect::back();
            }               
        }  
    }   

    //admin dashboard
    public function dashboard()
    {
        return view('admin/dashboard');  
    }

    /**
    *   For use general settings of website
    */
    public function generalSettings()
    {
        
        // $data['page_title'] = 'General Settings';
        // $settings = Settings::all();
        
        // foreach ($settings as $key => $value) {
        //     $data['setting'][$value->key] = $value->value;
        // }
        // $data['setting'] = (object)$data['setting'];
        
        return view('admin/settings');
    }


    //logout
    public function logout(Request $request)
    {
        \Auth::logout();
        $request->session()->flush();
        return redirect('login');
    }

    //front end user display
    public function frontuser()
    {
        echo '<a href="logout">jingo</a>';
        dd('hello user');  
    }

}
