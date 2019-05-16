<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Whatdowedo;
class WhatdowedoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data['page_title'] = 'What do We Do?';
        return view('admin.list.whatdowedo')->with($data);
    }
    public function getWhatDoWeDo () {
        return \Datatables::of(Whatdowedo::select(array('id','name','what_type', 'description', 'created_at', \DB::raw("DATE_FORMAT(created_at, '%d/%m/%Y') as created_attb")))->orderBy('id', 'DESC'))->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = 'Add What do We Do?';
        return view('admin.forms.add-whatdowedo')->with($data);
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
                'name' => 'required|regex:/^[\pL\s\-]+$/u|unique:teams|max:50',
                'what_type' => 'required|max:100',
                //'image_icon' => 'required|image|mimes:jpeg,png,jpg,gif|max:40',
                'image_icon' => 'required',
                'description' => 'required|max:450',
                ],
                [
                    'name.required' => 'Please enter Name.',
                    'name.regex' => 'Name field should contains only characters.',
                    'what_type.required' => 'Please enter Type.',
                    'description.required' => 'Please enter Description.',
                    
                ]
        );
        
        
        $data = $request->only(array('name', 'what_type', 'description'));
        
        $imageName = time().'.'.$request->image_icon->getClientOriginalExtension();
        $request->image_icon->move(public_path('uplodes/profile'), $imageName);
        $data['image_icon'] = $imageName;
        
        
        Whatdowedo::create ($data);
        $request->session()->flash('success', ' Add What do We Do? saved successfully.');
        return redirect('whatdowedo');
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
        $data['page_title'] = 'Edit  What do We Do? ';
        $data['dataRow'] = Whatdowedo::select(['*'])
                        ->where(['id'=>$id])->first();
        return view('admin.forms.edit-whatdowedo')->with($data);
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
                'name' => 'required|regex:/^[\pL\s\-]+$/u|unique:teams|max:50',
                'what_type' => 'required|max:100',
                //'image_icon' => 'image|mimes:jpeg,png,jpg,gif|max:40',
                'description' => 'required|max:450',
                ],
                [
                    'name.required' => 'Please enter Name.',
                    'name.regex' => 'Name field should contains only characters.',
                    'what_type.required' => 'Please enter Type.',
                    'description.required' => 'Please enter Description.',
                    
                ]
        );
        
        $data = $request->only(array('name', 'what_type', 'description'));
        
        $file = $request->file('image_icon');
        if(isset($file)) {
            $imageName = time().'.'.$request->image_icon->getClientOriginalExtension();
            $request->image_icon->move(public_path('uplodes/profile'), $imageName);
            $data['image_icon'] = $imageName;
        }
        
        $update = Whatdowedo::where('id', $id)->update($data);
        
        $request->session()->flash('success', ' Edit What do We Do? updated successfully.');
        return redirect('whatdowedo');
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
    public function delete(Request $request, $id)
    {
        Whatdowedo::where('id', $id)->delete();
        $request->session()->flash('success', 'What do We Do? deleted successfully.');
    }
}
