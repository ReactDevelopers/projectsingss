<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;

use App\Models\Users;
use App\Models\CompanyProfile;

class ComTemplateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'Company-Profile & Member Template';
        return view('admin.company-template.index')->with($data);
    }

    public function getComTemplate(Request $request)
    {
        // dd('bhbhbh');
        return \Datatables::of(Users::join('company_profile', 'users.id', '=', 'company_profile.user_id')->select('company_profile.*','users.id','users.name','users.email'))->make(true);  
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
        // $data['page_title'] = 'Edit CompanyProfile  Template';
        
        // $data['template'] = ComTemplate::select(['*'])->where(['id'=>$id])->first();
        // // dd($data['template']);
        // return view('admin.company-template.edit')->with($data);
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

    public function editCompany($id)
    {
        $data['page_title'] = 'Edit CompanyProfile  Template';
        $data['template'] = CompanyProfile::select('company_profile.*')->where('company_profile.user_id',$id)->first();
        // dd($data['template']);
        // $data['template'] = Users::join('company_profile', 'users.id', '=', 'company_profile.user_id')->select('company_profile.*')->where(['company_profile.user_id'=>$id])->first();
        // dd($data['template']);
        // if($data['comphone_number']=='')
        // {
        //     $data['comphone_number']='+65';
        // }  
        $data['categories']= getCategories();
        $data['services']= getServices();
        return view('admin.company-template.editcompany')->with($data);
    }

    public function Companysave(Request $request,$id)
    {
        $validator = \Validator::make($request->all(), [
            'company_name' => 'required|max:255|regex:/^[A-Za-z0-9 ]*$/',
            'comany_url' => 'required|url',
            'comany_roadaddress' => 'required|max:255|regex:/^[A-Za-z0-9 ]*$/',
            'comany_unitaddress' => 'required|max:255',
            'company_postalcode_address' => 'required|digits:6',
            'company_email' => 'nullable|email',
            'company_phone' => 'required|regex:/^[0-9\+]{11,11}$/',
            'company_fax' => 'nullable|numeric',
            'company_facebook' => 'nullable|nullable|url',
            'company_twitter' => 'nullable',
            'company_linkedin' => 'nullable|url', 
            'company_headline' => 'nullable|max:140',
            'activity' => 'required|max:5',
            'service' => 'required|max:5',
            'company_testimony' => 'nullable|max:140',
            'company_bios' => 'required|max:1500',
            'testimony_name' => 'required|max:255|regex:/^[A-Za-z0-9 ]*$/',
            'testimony_designation' => 'required|max:255|regex:/^[A-Za-z0-9 ]*$/',
           
        ], [], [
              // 'activity[].required' => 'Please enter min 5.',
              // 'min.required' => 'Please enter min 5.',
        ]);

        \Session::put('activeTab', $request->form_name);

        if ($validator->fails()) 
        { 
            // dd('err');
            return redirect()->back()->withErrors($validator, 'feature1')->withInput();
        } 
        else 
        {   
            $compid=$id;
             $com_form_content = array(
            // 'user_id'    => $ii,
            'com_name'    => $request->get('company_name'),
            'com_url'   => $request->get('comany_url'),
            'road_address'   => $request->get('comany_roadaddress'),
            'unit_address'   => $request->get('comany_unitaddress'),
            'postal_code'   => $request->get('company_postalcode_address'),
            'general_email'    => $request->get('company_email'),
            'comphone_number'    => $request->get('company_phone'),
            'fax_number'   => $request->get('company_fax'),
            'com_facebook_url'   => $request->get('company_facebook'),
            'com_twitter_url'   => $request->get('company_twitter'), 
            'com_linkedIn_url'   => $request->get('company_linkedin'), 
            'com_headline'   => $request->get('company_headline'),
            'categories'     => implode(',', (array) $request->get('activity')),
            'services'       => implode(',', (array) $request->get('service')),
            'com_testimony'   => $request->get('company_testimony'), 
            'com_write_up'   => $request->get('company_bios'), 
            'testimonial_name'   => $request->get('testimony_name'), 
            'testimonial_designation'   => $request->get('testimony_designation'), 
            );
            // dd($compid);
            CompanyProfile::com_Change($compid,$com_form_content);
            return redirect('admin/comprofile-template');
        }    
        // $data['page_title'] = 'Edit CompanyProfile  Template';
        
        // $data['template'] = ComTemplate::join('company_profile', 'users.id', '=', 'company_profile.user_id')->select('company_profile.*')->where(['company_profile.user_id'=>$id])->first();
        // // dd($data['template']);
        // return view('admin.company-template.editcompany')->with($data);
    }

    public function editMember($id)
    {
        $data['page_title'] = 'Edit MemberProfile  Template';
        
        $data['template'] = Users::join('company_profile', 'users.id', '=', 'company_profile.user_id')->select('company_profile.*','users.*')->where(['users.id'=>$id])->first();
        // dd($data['template']);
        return view('admin.company-template.editmember')->with($data);
    }

    public function Membersave (Request $request,$id)
    {
        $validator = \Validator::make($request->all(), [
           'member_first_name' => 'required|max:255|regex:/^[A-Za-z0-9 ]*$/',
           'member_surname' => 'required|max:255|regex:/^[A-Za-z0-9 ]*$/',
           'member_designation' => 'required|max:255',
           'member_email' => 'required|email',
           'member_phone' => 'required|regex:/^[0-9\+]{11,11}$/',
           'member_profilepic' => 'required',
           'member_profilepic' => 'required_if:member_profilepic_old,'.null,
           'member_profilepic_old' => 'required_if:member_profilepic,'.null,
           'member_bios' => 'required',
           'member_facebook' => 'nullable|url',
           'member_twitter' => 'nullable',
           'member_linkedin' => 'nullable|url',
        ], [], [
           // 'member_first_name.required' => 'Please enter name.',
           // 'featur->first()->toArray()e_tagline.required' => 'Please enter Description.',
        ]);

        \Session::put('activeTab', $request->form_name);

        $mainImage = $request->file('member_profilepic');
        $validator->after(function ($v) use ($request, $mainImage) {
        $allowExt = ['png','jpg','jpeg'];
        if ($mainImage) { 
        $ext = $request->member_profilepic->getClientOriginalExtension();
        $imageSize = @($mainImage->getSize()/1024); // Kb
        list($width ,$height) = getimagesize($mainImage->getPathName());
        $ext = strtolower($ext);
        if(!in_array($ext, $allowExt)){
        $v->errors()->add('member_profilepic', "Please upload a image file instead of a .".$ext." file!");
        } else if($imageSize > 200){
        $v->errors()->add('member_profilepic', "Your image size must be less then 200 KB");
        }else if($width > 300 || $height >300 ){
        $v->errors()->add('member_profilepic', "Please Select 300 (w) x 300 (h) pixels");
        }
        }
        });

        if ($validator->fails()) 
        { 
            return redirect()->back()->withErrors($validator, 'feature1')->withInput();
        } 
        else 
        {
            $userid= $id;
            // dd('succ');
            // $userid=\Auth::User()->id;
            // $check=$request->file('member_profilepic');
            // $ext = $check->getClientOriginalExtension();
            // $ext = $check->getClientOriginalName();
            // $check->move(public_path('/uploads/memberdetailspics/'), $ext);

            $form_content = array(
                'name'           => $request->get('member_first_name'),
                'surname'        => $request->get('member_surname'),
                'designation'   => $request->get('member_designation'),
                'email'   => $request->get('member_email'),
                'userphone_number'   => $request->get('member_phone'),
                // 'profile_picture'    => $imageName,
                'bios'    => $request->get('member_bios'),
                'facebook_url'   => $request->get('member_facebook'),
                'twitter_url'   => $request->get('member_twitter'),
                'linkedin_url'   => $request->get('member_linkedin'), 
            );
            $mainImage = $request->file('member_profilepic');
            if($mainImage)
            {
                $imageName = $mainImage->getClientOriginalName();
                $mainImage->move(public_path('/uploads/memberdetailspics/'), $imageName);
                $form_content['profile_picture'] = $imageName;
                if($request->member_profilepic_old && file_exists(public_path('/uploads/memberdetailspics/').$request->member_profilepic_old)) 
                {
                    unlink(public_path('/uploads/memberdetailspics/').$request->member_profilepic_old);
                } 
            }
            
            $data=Users::change($userid,$form_content);
            return redirect('admin/comprofile-template');
        }
    }
}
