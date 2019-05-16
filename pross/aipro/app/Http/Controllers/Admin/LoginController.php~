<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Session;

use App\Models\Settings;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'AIPRO Portal Admin Login';
        
        if (\Auth::check()){
            if(\Auth()->user()->user_type == 'admin') {
                return redirect('admin/dashboard');
            } else {
                return redirect('user/userprofile');
            }
        }
        else
            return view('userpages/user-login')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function checkLogin(Request $request)
    {
        $this->validate($request, [
                'email' => 'required|email',
                'password'=>'required'
                ],
                [
                    'email.required' => 'Please enter Email.',
                    'password.required'  => 'Please enter Password.',
                ]);

        if (\Auth::attempt(['email' => $request->email, 'password' => $request->password ,'status' => 'Active'])) {
            
            \App\Models\Users::where('id',\Auth()->user()->id)->update(['last_login' => date ('Y-m-d H:i:s')]);
            
            if(\Auth()->user()->user_type == 'admin') {
                return redirect('admin/dashboard');
            } else {
                return redirect('user/userprofile');
            }
        }else{
            return redirect('admin')->with('error','Invalid E-mail/Password!');
        }
    }

    public function logout(Request $request){
        \Auth::logout();
        $request->session()->flush();
        return redirect('/login');
    }

    /**
    *   For use general settings of website
    */
    public function generalSettings()
    {
        
        $data['page_title'] = 'General Settings';
        $settings = Settings::all();
        
        foreach ($settings as $key => $value) {
            $data['setting'][$value->key] = $value->value;
        }
        $data['setting'] = (object)$data['setting'];
        
        return view('admin/settings')->with($data);
    }

    public function updateSettings(Request $request)
    {   
        $validator = \Validator::make($request->all(), [
                'admin_email' => ['required','email'],
                'site_title' => ['required'],
                
        ]);
        if ($validator->fails()) {
            
            return redirect('/admin/settings')
                        ->withErrors($validator)
                        ->withInput();
            
        }else{
            foreach ($request->except('_token') as $key => $value) {
                DB::table('settings')
                    ->where('key', $key)
                    ->update(['value' => $value]); 
            }
            $request->session()->flash('success', 'Settings updated successfully.');
        }
        return redirect('/admin/settings');
    }

    public function dashboard(){
        
        $data['contacts'] = \App\Models\Contact::select(array('id','user_name','user_email', 'subject', 'message'))->orderBy('id', 'DESC')->limit(2)->get()->toArray();
        
        return view('admin.dashboard')->with($data);;
    }

    

}
