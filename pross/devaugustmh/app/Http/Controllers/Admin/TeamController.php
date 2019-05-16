<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Teams;
class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'Meet Our Team';
        return view('admin.list.team')->with($data);
    }
    public function getNews(Request $request)
    {
        return \Datatables::of(Teams::select(array('id','name','designation', 'description', 'created_at', \DB::raw("DATE_FORMAT(created_at, '%d/%m/%Y') as created_attb"))))->make(true);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = 'Add Meet Our Team ';
        return view('admin.forms.add-team')->with($data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
                'name' => 'required|regex:/^[\pL\s\-]+$/u|unique:teams|max:100',
                'email' => 'email',
                //'profile_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:182',
                'profile_image' => 'required',
                'description' => 'required|max:400',
                'designation' => 'required|max:100',
                'facebook_url' => ['regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
                'twitter_url' => ['regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
                'linkedin_url' => ['regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
                'google_plus_url' => ['regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
                ],
                [
                    'name.required' => 'Please enter Name.',
                    'name.regex' => 'Name field should contains only characters.',
                    'description.required' => 'Please enter Description.',
                    'designation.required' => 'Please enter Designation.',
                    
                ]
        );
        
        
        $data = $request->only(array('name', 'designation', 'description','email', 'facebook_url', 'skype_url', 'twitter_url', 'linkedin_url', 'google_plus_url'));
        
        $imageName = time().'.'.$request->profile_image->getClientOriginalExtension();
        $request->profile_image->move(public_path('uplodes/profile'), $imageName);
        $data['profile_image'] = $imageName;
        if(isset($request->socialicon)) {
            $data['social_link'] = implode(',', $request->socialicon);
        }
        
        Teams::create ($data);
        $request->session()->flash('success', 'Meet Our Team  saved successfully.');
        return redirect('team');
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
        $data['page_title'] = 'Edit Meet Our Team ';
        $data['dataRow'] = Teams::select(['*'])
                        ->where(['id'=>$id])->first();
        return view('admin.forms.edit-team')->with($data);
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
        $this->validate($request, [
                'name' => 'required|regex:/^[\pL\s\-]+$/u|unique:news,title,'.$id.',id|max:100',
                'email' => 'email',
                'description' => 'required|max:400',
                'designation' => 'required|max:100',
                //'profile_image' => 'image|mimes:jpeg,png,jpg,gif|max:182',
                'facebook_url' => ['regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
                'twitter_url' => ['regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
                'linkedin_url' => ['regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
                'google_plus_url' => ['regex:/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i'],
                ],
                [
                    'name.required' => 'Please enter Name.',
                    'name.regex' => 'Name field should contains only characters.',
                    'description.required' => 'Please enter Description.',
                    'designation.required' => 'Please enter Designation.',
                    
                ]
        );
        
        $data = $request->only(array('name', 'designation', 'description', 'email', 'facebook_url', 'skype_url', 'twitter_url', 'linkedin_url', 'google_plus_url'));
        if(isset($request->socialicon)) {
            $data['social_link'] = implode(',', $request->socialicon);
        }
        $file = $request->file('profile_image');
        if(isset($file)) {
            $imageName = time().'.'.$request->profile_image->getClientOriginalExtension();
            $request->profile_image->move(public_path('uplodes/profile'), $imageName);
            $data['profile_image'] = $imageName;
        }
        
        $update = Teams::where('id', $id)->update($data);
        
        $request->session()->flash('success', 'Meet Our Team updated successfully.');
        return redirect('team');
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
    
    /**
     * Delete the record.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete(Request $request, $id)
    {
        Teams::where('id', $id)->delete();
        $request->session()->flash('success', 'Meet Our Team deleted successfully.');
    }
}
