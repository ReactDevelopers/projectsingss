<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

use App\Models\OfficeBearer;

class OfficeBearerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'Office Bearer Template';
        return view('admin.officebearers-template.index')->with($data);
    }

    public function getofficeempTemplate(Request $request)
    {
        return \Datatables::of(OfficeBearer::select(['id','name','email','designation','created_at']))->make(true);  
        // $getEmailTemplate = EmailTemplate::all('object',['email_template_id','subject','description']);
        // $data['getEmailTemplate'] = array();
        // foreach ($getEmailTemplate as $key => $value) {
        //     $data['getEmailTemplate'][$key]['email_template_id'] = ($value->email_template_id);
        //     $data['getEmailTemplate'][$key]['subject'] = ($value->subject);
        //     $data['getEmailTemplate'][$key]['description'] = strip_tags($value->description);
        // }
        // return \Datatables::of($data['getEmailTemplate'])->make(true);        
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
        $data['page_title'] = 'Edit Email Template';
        
        $data['template'] = EmailTemplate::select(['email_template_id','subject','description'])->where(['email_template_id'=>$id])->first();
        return view('admin.email-template.edit')->with($data);
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
                'title' => 'required',
                'description' => 'required',
                ],
                [
                    'title.required' => 'Please enter Title.',
                    'description.required' => 'Please enter Description.',
                ]
        );

        EmailTemplate::where('email_template_id', $id)
            ->update([
                        'subject' => $request->title, 
                        'description' => $request->description,
                    ]
        );

        $request->session()->flash('success', 'Email Template updated successfully.');
        return redirect('admin/email-template');
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

    public function editBearers(Request $request, $id)
    {
        $data['page_title'] = 'Edit Email Template';
        
        $data['template'] = OfficeBearer::select(['*'])->where(['id'=>$id])->first();
        return view('admin.officebearers-template.edit')->with($data);
    } 

    public function saveBearers(Request $request, $id)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|unique:office_bearers,email',
            'designation' => 'required',
            'image' => 'required_if:picture_old,'.null,
            'picture_old' => 'required_if:image,'.null,
            'short_desc' => 'nullable',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable',
            'linkedin' => 'nullable|url', 
            'content_desc' => 'nullable',
            'highlight1' => 'required',
            'highlight2' => 'nullable|max:400',
            'highlight3' => 'nullable|max:400',
            'description' => 'nullable',
            'bios' => 'required|max:2000',
            'testimonial_name' => 'required_with:testimonial_quote|max:255',
            'testimonial_designation' => 'required_with:testimonial_quote|max:255',
            'testimonial_quote' => 'required_with:testimonial_name',
            'testimonial_quote' => 'required_with:testimonial_designation',
            'testimonial_quote' => 'nullable|max:140',
        ], [], [
              // 'activity[].required' => 'Please enter min 5.',
              // 'min.required' => 'Please enter min 5.',
        ]);

        $mainImage = $request->file('image');
        $validator->after(function ($v) use ($request, $mainImage) {
        $allowExt = ['png','jpg','jpeg'];
        if ($mainImage) { 
        $ext = $request->image->getClientOriginalExtension();
        $imageSize = @($mainImage->getSize()/1024); // Kb
        list($width ,$height) = getimagesize($mainImage->getPathName());
        $ext = strtolower($ext);
        if(!in_array($ext, $allowExt)){
        $v->errors()->add('image', "Please upload a image file instead of a .".$ext." file!");
        } else if($imageSize > 200){
        $v->errors()->add('image', "Your image size must be less then 200 KB");
        }else if($width > 700 || $height >700 ){
        $v->errors()->add('image', "Please Select 700 (w) x 700 (h) pixels");
        }
        }
        });

        if ($validator->fails()) 
        { 
            return redirect()->back()->withErrors($validator, 'feature1')->withInput();
        } 
        else 
        {  
            $form_content = array(
            'name'                      => $request->get('name'),
            'email'                     => $request->get('email'),
            'designation'               => $request->get('designation'),
            'short_desc'                => $request->get('short_desc'),
            'facebook'                  => $request->get('facebook'),
            'twitter'                   => $request->get('twitter'),
            'linkedin'                  => $request->get('linkedin'),
            'content_desc'              => $request->get('content_desc'),
            'highlight1'                => $request->get('highlight1'),
            'highlight2'                => $request->get('highlight2'),
            'highlight3'                => $request->get('highlight3'),
            'description'               => $request->get('description'),
            'bios'                      => $request->get('bios'),
            'testimonial_quote'         => $request->get('testimonial_quote'),
            'testimonial_name'          => $request->get('testimonial_name'),
            'testimonial_designation'   => $request->get('testimonial_designation'),
            'status'                    => $request->get('status'),
            );
            // dd($form_content);
            $mainImage = $request->file('image');
            if($mainImage)
            {
                $imageName = $mainImage->getClientOriginalName();
                $mainImage->move(public_path('/images/team/'), $imageName);
                $form_content['image'] = $imageName;
                if($request->picture_old && file_exists(public_path('/images/team/').$request->picture_old)) 
                {
                    unlink(public_path('/images/team/').$request->picture_old);
                } 
            }
            
            OfficeBearer::where('id', $id)->update($form_content);
            return redirect('admin/officeemp');   
        }  
    }
    
    public function addBearers(Request $request)
    {
        $data['page_title'] = 'Add OfficeBearer Template';
        return view('admin.officebearers-template.add')->with($data);
    } 
    
    public function addsaveBearers(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required|unique:office_bearers,name',
            'email' => 'required|unique:office_bearers,email',
            'designation' => 'required',
            'picture' => 'required',
            'short_desc' => 'nullable',
            'facebook' => 'nullable|url',
            'twitter' => 'nullable',
            'linkedin' => 'nullable|url', 
            'content_desc' => 'nullable',
            'highlight1' => 'required',
            'highlight2' => 'nullable|max:400',
            'highlight3' => 'nullable|max:400',
            'description' => 'nullable',
            'bios' => 'required|max:2000',
            'testimonial_name' => 'required_with:testimonial_quote|max:255',
            'testimonial_designation' => 'required_with:testimonial_quote|max:255',
            'testimonial_quote' => 'required_with:testimonial_name',
            'testimonial_quote' => 'required_with:testimonial_designation',
            'testimonial_quote' => 'nullable|max:140',
        ], [], [
              // 'activity[].required' => 'Please enter min 5.',
              // 'min.required' => 'Please enter min 5.',
        ]);

        $mainImage = $request->file('picture');
        $validator->after(function ($v) use ($request, $mainImage) {
        $allowExt = ['png','jpg','jpeg'];
        if ($mainImage) { 
        $ext = $request->picture->getClientOriginalExtension();
        $imageSize = @($mainImage->getSize()/1024); // Kb
        list($width ,$height) = getimagesize($mainImage->getPathName());
        $ext = strtolower($ext);
        if(!in_array($ext, $allowExt)){
        $v->errors()->add('picture', "Please upload a image file instead of a .".$ext." file!");
        } else if($imageSize > 200){
        $v->errors()->add('picture', "Your image size must be less then 200 KB");
        }else if($width > 700 || $height >700 ){
        $v->errors()->add('picture', "Please Select 700 (w) x 700 (h) pixels");
        }
        }
        });

        if ($validator->fails()) 
        { 
            return redirect()->back()->withErrors($validator, 'feature1')->withInput();
        } 
        else 
        {   
            $form_content = array(
            'name'                      => $request->get('name'),
            'email'                     => $request->get('email'),
            'designation'               => $request->get('designation'),
            'short_desc'                => $request->get('short_desc'),
            'facebook'                  => $request->get('facebook'),
            'twitter'                   => $request->get('twitter'),
            'linkedin'                  => $request->get('linkedin'),
            'content_desc'              => $request->get('content_desc'),
            'highlight1'                => $request->get('highlight1'),
            'highlight2'                => $request->get('highlight2'),
            'highlight3'                => $request->get('highlight3'),
            'description'               => $request->get('description'),
            'bios'                      => $request->get('bios'),
            'testimonial_quote'         => $request->get('testimonial_quote'),
            'testimonial_name'          => $request->get('testimonial_name'),
            'testimonial_designation'   => $request->get('testimonial_designation'),
            'status'                    => $request->get('status'),
            );
            // dd($form_content);
            $mainImage = $request->file('picture');
            if($mainImage)
            {
                $imageName = $mainImage->getClientOriginalName();
                $mainImage->move(public_path('/images/team/'), $imageName);
                $form_content['image'] = $imageName;
            }
            
            $data=OfficeBearer::create($form_content);
            return redirect('admin/officeemp');   
        }  
    }

    public function delete($id)
    {
        // dd($id);
        $data['static'] = OfficeBearer::where('id',$id)->delete();
        // return view('admin.contact-template.edit')->with($data);
    }

}
