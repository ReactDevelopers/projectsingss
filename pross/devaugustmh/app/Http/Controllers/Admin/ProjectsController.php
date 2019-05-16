<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Projects;

class ProjectsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'Projects';
        return view('admin.list.project')->with($data);
    }
    public function getProjects(Request $request)
    {
        
        return \Datatables::of(Projects::select(array('id','project_name', 'created_at', \DB::raw("DATE_FORMAT(created_at, '%d/%m/%Y') as created_attb"))))->make(true);
    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = 'Add Project';
        return view('admin.forms.add-project')->with($data);
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
                'project_name' => 'required|unique:projects|max:100',
                //'project_image' => 'required|image|mimes:jpeg,png,jpg,gif|max:1024',
                'project_image' => 'required',
                ],
                [
                    'project_name.required' => 'Please enter Project Name.',
                    'project_image.required' => 'Please select Project Image.', 
                ]
        );
        
        
        $imageName = time().'.'.$request->project_image->getClientOriginalExtension();
        $request->project_image->move(public_path('uplodes/projects'), $imageName);
        $data['project_name'] = $request->project_name;
        $data['project_image'] = $imageName;
        //dd($data);
        Projects::create ($data);
        $request->session()->flash('success', 'Project saved successfully.');
        return redirect('projects');
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
        $data['page_title'] = 'Edit Project';
        $data['dataRow'] = Projects::select(['*'])
                        ->where(['id'=>$id])->first();
        return view('admin.forms.edit-projects')->with($data);
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
                'project_name' => 'required|unique:projects,project_name,'.$id.',id|max:100',
                //'project_image' => 'image|mimes:jpeg,png,jpg,gif|max:1024',
                ],
                [
                    'project_name.required' => 'Please enter Project Name.',
                    'project_image' => 'Please select Project Image.', 
                ]
        );
        
        $file = $request->file('project_image');
        
        if(isset($file)) {
            //$mainFile = $file->getClientOriginalName();
            //$fileType = strtolower($file->getClientOriginalExtension());
            $imageName = time().'.'.$request->project_image->getClientOriginalExtension();
            $request->project_image->move(public_path('uplodes/projects'), $imageName);
            $data['project_image'] = $imageName;
        }
        
        $data['project_name'] = $request->project_name;
        $update = Projects::where('id', $id)->update($data);
        
        $request->session()->flash('success', 'Project updated successfully.');
        return redirect('projects');
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
        Projects::where('id', $id)->delete();
        $request->session()->flash('success', 'Meet Our Team deleted successfully.');
    }
}
