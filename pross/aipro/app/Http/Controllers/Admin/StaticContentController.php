<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

use App\Models\StaticContent;

class StaticContentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'Static Content';
        return view('admin.static.index')->with($data);
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

    public function getStatic(Request $request)
    {
        $getStatic = StaticContent::all('object',['title','description','alias']);
        
        $data['getStatic'] = array();
        foreach ($getStatic as $key => $value) {
            $data['getStatic'][$key]['description'] = ($value->description);
            $data['getStatic'][$key]['title'] = ($value->title);
            $data['getStatic'][$key]['alias'] = strtoupper($value->alias);
            $data['getStatic'][$key]['id'] = $value->alias;
        }
        return \Datatables::of($data['getStatic'])->make(true);        
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
        $data['page_title'] = 'Edit Static Content';
        
        $data['static'] = StaticContent::select()->where(['alias'=>$id])->first();
        //dd($data['static']->alias); // edit-agreements.blade.php
        switch ($data['static']->alias) {
            case 'reports':
                $data['page_title'] = 'Edit Industry Reports';
                return view('admin.static.edit-reports')->with($data);
            break;
            case 'legalpersonnel':
                $data['page_title'] = 'Edit Personnel Agreements';
                return view('admin.static.edit-agreements')->with($data);
            case 'legalcommercial':
                $data['page_title'] = 'Edit Commercial Agreements';
                return view('admin.static.edit-agreements')->with($data);
            case 'treaties':
                $data['page_title'] = 'Edit Co-Production Treaties';
                return view('admin.static.edit-agreements')->with($data);
            break;
            default:
                return view('admin.static.edit')->with($data);
        }
        
        
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
            'title' => 'required',
            'description' => 'required'
        ], [], [
            'title.required' => 'Please enter Title.',
            'description.required' => 'Please enter Description.',
        ]);
        //$request->alias
        switch ($id){
            case 'reports':
                $updateData = $request->only(['title', 'description',
                                             'sub_title_1', 'description_1',
                                             'sub_title_2', 'description_2',
                                             'sub_title_3', 'description_3',
                                             'sub_title_4', 'description_4',
                                             'sub_title_5', 'description_5',
                                             'sub_title_6', 'description_6',
                                             'sub_title_7', 'description_7',
                                             'sub_title_8', 'description_8',
                                             ]);
                
            break;
            case 'legalpersonnel' :
            case 'legalcommercial' :
            case 'treaties' :
                $document_1 = $request->file('document_1');
                $document_2 = $request->file('document_2');
                $validator->after(function ($v) use ($request, $document_1, $document_2) {
                    $allowExt = ['pdf'];
                    if ($document_1) { 
                        $ext = $request->document_1->getClientOriginalExtension();
                        $ext = strtolower($ext);
                        if(!in_array($ext, $allowExt)){
                            $v->errors()->add('document_1', "Please upload a image file instead of a .".$ext." file!");
                        }
                    }
                    if ($document_2) { 
                        $ext_2 = $request->document_2->getClientOriginalExtension();
                        $ext_2 = strtolower($ext_2);
                        if(!in_array($ext_2, $allowExt)){
                            $v->errors()->add('document_2', "Please upload a image file instead of a .".$ext_2." file!");
                        }
                    }
                });
                $updateData = $request->only(['title', 'description',
                                             'sub_title_1', 'description_1',
                                             'sub_title_2', 'description_2',
                                             'sub_title_3', 'description_3',
                                             'sub_title_4', 'description_4',
                                             'sub_title_5', 'description_5',
                                             'sub_title_6', 'description_6',
                                             'sub_title_7', 'description_7',
                                             'sub_title_8', 'description_8',
                                             'sub_title_9', 'description_9',
                                             ]);

                
                if($request->delete_document_1 && file_exists(public_path('uploads/documents/').$request->old_document_1)) {
                    @unlink(public_path('uploads/documents/').$request->old_document_1);
                    $updateData['document_1'] = null;
                }
                if (!$validator->fails()) {
                    if(isset($document_1)) {
                        $imageName = self::getFileName($request->document_1->getClientOriginalName()).'_'.time().'.'.$request->document_1->getClientOriginalExtension();
                        $request->document_1->move(public_path('uploads/documents'), $imageName);
                        $updateData['document_1'] = $imageName;
                        if($request->old_document_1 && file_exists(public_path('uploads/documents/').$request->old_document_1)) {
                            @unlink(public_path('uploads/documents/').$request->old_document_1);
                        }
                    }
                }
                
                if($request->delete_document_2 && file_exists(public_path('uploads/documents/').$request->old_document_1)) {
                    @unlink(public_path('uploads/documents/').$request->old_document_2);
                    $updateData['document_2'] = null;
                }
                if (!$validator->fails()) {
                    if(isset($document_2)) {
                        $imageName = self::getFileName($request->document_2->getClientOriginalName()).'_'.time().'.'.$request->document_2->getClientOriginalExtension();
                        $request->document_2->move(public_path('uploads/documents'), $imageName);
                        $updateData['document_2'] = $imageName;
                        if($request->old_document_2 && file_exists(public_path('uploads/documents/').$request->old_document_1)) {
                            @unlink(public_path('uploads/documents/').$request->old_document_2);
                        }
                    }
                }
                
            break;
            default:
        
            /*
            $this->validate($request, [
                    'title' => 'required',
                    'description' => 'required',
                    'page_image' => 'mimes:jpeg,jpg,png | max:555',
                    ],
                    [
                        'title.required' => 'Please enter Title.',
                        'description.required' => 'Please enter Description.',
                    ]
            );
            */
            $image = $request->file('page_image');
            $validator->after(function ($v) use ($request, $image) {
                $allowExt = ['jpeg' ,'png', 'jpg', 'gif'];
                if ($image) { 
                    $ext = $request->page_image->getClientOriginalExtension();
                    $ext = strtolower($ext);
                    if(!in_array($ext, $allowExt)){
                        $v->errors()->add('page_image', "Please upload a image file instead of a .".$ext." file!");
                    }
                }
            });
            
            if (!$validator->fails()) {
                $updateData = [
                                'title' => $request->title,
                                'sub_title_1'=> $request->sub_title_1,
                                'sub_title_2'=> $request->sub_title_2,
                                'description'=> $request->description,
                                'sub_title_3'=> $request->sub_title_3,
                                'description_2'=> $request->description_2,
                                'description_3'=> $request->description_3,
                                'add_more_points'=> $request->add_more_points,
                            ];
                if(isset($image)) {
                        $imageName = time().'.'.$request->page_image->getClientOriginalExtension();
                        $request->page_image->move(public_path('uploads/images'), $imageName);
                        $updateData['page_image'] = $imageName;
                        if($request->old_image && file_exists(public_path('uploads/images/').$request->old_image)) {
                            unlink(public_path('uploads/images/').$request->old_image);
                        }
                }
            }
        } // SWITCH CLOSE
        
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        } else {
            StaticContent::where('alias', $id)
                ->update($updateData);
            $request->session()->flash('success', 'Static Content updated successfully.');
            return redirect('admin/static');
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
    
    public function Download ($fileName){
        $file = public_path('uploads/documents/').$fileName;
        if (file_exists($file)) {
            header('Content-Description: File Transfer');
            header('Content-Type: application/octet-stream');
            header('Content-Disposition: attachment; filename="'.basename($file).'"');
            header('Expires: 0');
            header('Cache-Control: must-revalidate');
            header('Pragma: public');
            header('Content-Length: ' . filesize($file));
            readfile($file);
            exit;
        }  
    }
    
    
    private function getFileName($fileName = '') {
        if(empty($fileName))
            return false;
        $order   = array(" ");
        $orgFileName = explode(".",$fileName);
        $total = count($orgFileName)-1;
        unset($orgFileName[$total]);
        $orgFileName = implode ("_", $orgFileName);
        return str_replace($order, "_", $orgFileName);
    }
}
