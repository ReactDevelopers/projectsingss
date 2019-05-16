<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Banners;

class BannersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'Banners';
        return view('admin.list.banners')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['page_title'] = 'Add Banner';
        return view('admin.forms.add-banners')->with($data);
    }
    
    public function getBanners(Request $request)
    {
        
        return \Datatables::of(Banners::select(array('id','banner_name', 'banner_image', 'created_at', \DB::raw("DATE_FORMAT(created_at, '%d/%m/%Y') as created_attb"))))->make(true);
    
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'banner_name' => 'required|unique:banners|max:100',
            'banner_image' => 'required'
        ], [], [

            'banner_name.required' => 'Please enter Banner Name.',
            'banner_image.required' => 'Please select Banner Image.',
        ]);
        
        $image = \Input::file('banner_image');
        $validator->after(function ($v) use ($request, $image) {
            $allowExt = ['jpeg' ,'png', 'jpg', 'gif'];
            if ($image) { 
                $ext = $request->banner_image->getClientOriginalExtension();
                $ext = strtolower($ext);
                if(!in_array($ext, $allowExt)){
                    $v->errors()->add('banner_image', "Please upload a image file instead of a .".$ext." file!");
                }
            }
        });
        
        if ($validator->fails()) {
            return redirect('banners/create')->withErrors($validator)->withInput();
        } else {
            $imageName = time().'.'.$request->banner_image->getClientOriginalExtension();
            $request->banner_image->move(public_path('uplodes/banner'), $imageName);
            $data['banner_name'] = $request->banner_name;
            $data['banner_image'] = $imageName;
            Banners::create ($data);
            $request->session()->flash('success', 'Banner image saved successfully.');
            return redirect('banners');/**/
        }
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
        $data['page_title'] = 'Edit Banner';
        $data['dataRow'] = Banners::select(['*'])
                        ->where(['id'=>$id])->first();
        return view('admin.forms.edit-banners')->with($data);
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
        
        $validator = \Validator::make($request->all(), [
            'banner_name' => 'required|unique:banners,banner_name,'.$id.',id|max:100'
        ], [], [
            'banner_name.required' => 'Please enter Banner Name.',
        ]);
        
        $image = $request->file('banner_image');
        $validator->after(function ($v) use ($request, $image) {
            $allowExt = ['jpeg' ,'png', 'jpg', 'gif'];
            if ($image) { 
                $ext = $request->banner_image->getClientOriginalExtension();
                $ext = strtolower($ext);
                if(!in_array($ext, $allowExt)){
                    $v->errors()->add('banner_image', "Please upload a image file instead of a .".$ext." file!");
                }
            }
        });
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            if(isset($image)) {
                $imageName = time().'.'.$request->banner_image->getClientOriginalExtension();
                $request->banner_image->move(public_path('uplodes/banner'), $imageName);
                $data['banner_image'] = $imageName;
                if($request->old_image && file_exists(public_path('uplodes/banner/').$request->old_image)) {
                    unlink(public_path('uplodes/banner/').$request->old_image);
                }
            }
            $data['banner_name'] = $request->banner_name;
            $update = Banners::where('id', $id)->update($data);
        
            $request->session()->flash('success', 'Banner Image updated successfully.');
            return redirect('banners');
        }
        
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
        if($id){
            $imageName = Banners::select(['banner_image'])->where(['id'=>$id])->first()->banner_image;
            if($imageName && file_exists(public_path('uplodes/banner/').$imageName)) {
                unlink(public_path('uplodes/banner/').$imageName);
            }
            Banners::where('id', $id)->delete();
            $request->session()->flash('success', 'Banner Image deleted successfully.');
        }
    }
}
