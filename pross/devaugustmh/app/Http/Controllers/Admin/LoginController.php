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
        $data['page_title'] = 'August Media Portal Admin Login';
        
        if (\Auth::check()){
            
                return redirect('admin/dashboard');
            
        }
        else
            return view('admin/index')->with($data);
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
            // Authentication passed... 
            return redirect('admin/dashboard');
        }else{
            return redirect('admin')->with('error','Invalid E-mail/Password!');
        }
    }

    public function logout(Request $request){
        \Auth::logout();
        $request->session()->flush();
        return redirect('login');
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
                'smtp_server_host' => ['required'],
                'smtp_port_number' => 'required|numeric',
                'smtp_uPass' => ['required'],
                'smtp_uName' => ['required'],
                'banner_image' => 'image|mimes:jpeg,png,jpg,gif',
                //'facebook_url' => ['required','regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
                //'twitter_url' => ['required','regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
                //'linkedin_url' => ['required','regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
                //'google_url' => ['required','regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
               // 'copyright' => ['required'],
        ]);
        if ($validator->fails()) {
            
            return redirect('/settings')
                        ->withErrors($validator)
                        ->withInput();
            
        }else{
        
        $imageName = '';   
        $file = $request->file('banner_image');
        if(isset($file)) {
            $imageName = time().'.'.$request->banner_image->getClientOriginalExtension();
            $request->banner_image->move(public_path('uplodes/banner'), $imageName);
        }
        
            foreach ($request->except('_token') as $key => $value) {
                if($imageName && $key == 'banner_image') {
                    DB::table('settings' )
                    ->where('key', $key)
                    ->update(['value' => $imageName]);
                } else {
                    DB::table('settings')
                    ->where('key', $key)
                    ->update(['value' => $value]);
                }
                
            }
            $request->session()->flash('success', 'Settings updated successfully.');
        }
        return redirect('/settings');
    }

    public function dashboard(){
        
        $data['contacts'] = \App\Models\Contact::select(array('id','user_name','user_email', 'subject', 'message', \DB::raw("DATE_FORMAT(created_at, '%d/%m/%Y') as created_attb")))->orderBy('id', 'DESC')->limit(2)->get()->toArray();
        
        return view('admin.dashboard')->with($data);;
    }

    /********* change status *********/
    public function changeStatus(Request $request){

        if($request->controller == 'placement')
        {
            if($request->status == 'approve'):
                DB::table('placement')->where('placement_id',$request->id)->update(['placement_status' => '4']);
                $template = 'placement_approve';
            endif;

            if($request->status == 'reject'):
                DB::table('placement')->where('placement_id',$request->id)->update(['placement_status' => '6']);
                $template = 'placement_reject';
            endif;

            $table_prefix = DB::getTablePrefix();

            $user_detail = DB::select('SELECT us.*, p.*, CONCAT(us.first_name," ",us.last_name) as name FROM '.$table_prefix.'placement as p INNER JOIN '.$table_prefix.'users as us ON p.user_id = us.user_id WHERE p.placement_id ='.$request->id);
            
            $data['name'] = $user_detail[0]->name;
            $data['title'] = $user_detail[0]->title;
            $data['description'] = $user_detail[0]->description;
            $data['message'] = $request->message;

            send_email($user_detail[0]->email,sprintf("%s",$data['name']),$template,$data);
        }

    }

}