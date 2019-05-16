<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CompanyFeatures;
use App\Models\Users;
use App\Models\CompanyProfile;
class FeatureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['page_title'] = 'Features';
        return view('admin.feature-template.index')->with($data);
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
    
    public function featureEdit (){
        $pageData['title'] = 'Connect';
        $pageData['lists'] = CompanyFeatures::where('user_id', \Auth::User()->id)->get();
        
        return view('userpages/feature-edit')->with($pageData); 
        
    }
    public function featureSave (Request $request) {
        // dd($request->radioList);
        $validator = \Validator::make($request->all(), [
            'feature_program_name' => 'required|max:255|regex:/^[A-Za-z0-9 ]*$/',
            'feature_tag_line' => 'required|max:140',
            'feature_bios' => 'required|max:3000',
            'feature_highlight1' => 'required|max:400|regex:/^[A-Za-z0-9 ]*$/',
            'feature_highlight2' => 'nullable|max:400|regex:/^[A-Za-z0-9 ]*$/',
            'feature_highlight3' => 'nullable|max:400|regex:/^[A-Za-z0-9 ]*$/',
            'page_main_picture' => 'required_if:page_main_picture_old,'.null,
            'page_main_picture_old' => 'required_if:page_main_picture,'.null,
            'page_side_picture' => 'required_if:page_side_picture_old,'.null,
            'page_side_picture_old' => 'required_if:page_side_picture,'.null,
            'home_page_main_picture' => 'required_if:home_page_main_picture_old,'.null,
            'home_page_main_picture_old' => 'required_if:home_page_main_picture,'.null,
            'feature_testimony_name' => 'required_with:feature_testimony|max:255',
            'feature_testimony_designation' => 'required_with:feature_testimony|max:255',
            'feature_testimony' => 'required_with:feature_testimony_name',
            'feature_testimony' => 'required_with:feature_testimony_designation',
            'feature_testimony' => 'nullable|max:140',
        ], [], [
            'feature_program_name.required' => 'Please enter Title.',
            'feature_tagline.required' => 'Please enter Description.',
        ]);
        
        $featureId = $request->feature_info;
        
        \Session::put('activeTab', $request->form_name);
        
        $mainImage = $request->file('page_main_picture');
        $validator->after(function ($v) use ($request, $mainImage) {
            $allowExt = ['jpeg' ,'png', 'jpg'];
            if ($mainImage) { 
                $ext = $request->page_main_picture->getClientOriginalExtension();
                $imageSize = @($mainImage->getSize()/1024); // Kb
                list($width ,$height) = getimagesize($mainImage->getPathName());
                $ext = strtolower($ext);
                if(!in_array($ext, $allowExt)){
                    $v->errors()->add('page_main_picture', "Please upload a image file instead of a .".$ext." file!");
                } else if($imageSize > 200){
                    $v->errors()->add('page_main_picture', "Your image size must be less then 200 KB");
                }else if($width > 1170 || $height >780 ){
                    $v->errors()->add('page_main_picture', "Please Select 1170 (w) x 780 (h) pixels");
                }
            }
        });

        $sideImage = $request->file('page_side_picture');
        $validator->after(function ($v) use ($request, $sideImage) {
            $allowExt = ['jpeg' ,'png', 'jpg'];
            if ($sideImage) { 
                $ext = $request->page_side_picture->getClientOriginalExtension();
                $imageSize = @($sideImage->getSize()/1024); // Kb
                list($width ,$height) = getimagesize($sideImage->getPathName());
                $ext = strtolower($ext);
                if(!in_array($ext, $allowExt)){
                    $v->errors()->add('page_side_picture', "Please upload a image file instead of a .".$ext." file!");
                } else if($imageSize > 80){
                    $v->errors()->add('page_side_picture', "Your image size must be less then 200 KB");
                }else if($width > 270 || $height >386 ){
                    $v->errors()->add('page_side_picture', "Please Select 270 (w) x 386 (h) pixels");
                }
            }
        });
        
        $pageMainImage = $request->file('home_page_main_picture');
        $validator->after(function ($v) use ($request, $pageMainImage) {
            $allowExt = ['jpeg' ,'png', 'jpg'];
            if ($pageMainImage) { 
                $ext = $request->home_page_main_picture->getClientOriginalExtension();
                $imageSize = @($pageMainImage->getSize()/1024); // Kb
                list($width ,$height) = getimagesize($pageMainImage->getPathName());
                $ext = strtolower($ext);
                if(!in_array($ext, $allowExt)){
                    $v->errors()->add('home_page_main_picture', "Please upload a image file instead of a .".$ext." file!");
                } else if($imageSize > 340){
                    $v->errors()->add('home_page_main_picture', "Your image size must be less then 200 KB");
                }else if($width > 1920 || $height >1000 ){
                    $v->errors()->add('home_page_main_picture', "Please Select 1170 (w) x 780 (h) pixels");
                }
            }
        });
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator, $request->form_name)->withInput();
        } else if($featureId){
            $data = $request->only(['feature_program_name','feature_tag_line', 'feature_bios',
                                    'feature_testimony', 'feature_testimony_name', 'feature_testimony_designation',
                                    'feature_highlight1', 'feature_highlight2', 'feature_highlight3']);
            
        $mainImage = $request->file('page_main_picture');
        if($mainImage){
            $imageName = self::getFileName($request->page_main_picture->getClientOriginalName());
            $request->page_main_picture->move(public_path('uploads/features'), $imageName);
            $data['page_main_picture'] = $imageName;
            if($request->page_main_picture_old && file_exists(public_path('uploads/features/').$request->page_main_picture_old)) {
                unlink(public_path('uploads/features/').$request->page_main_picture_old);
            } 
        }
        
        $sideImage = $request->file('page_side_picture');
        if($sideImage){
            $sideImageName = self::getFileName($request->page_side_picture->getClientOriginalName()); 
            $request->page_side_picture->move(public_path('uploads/features'), $sideImageName);
            $data['page_side_picture'] = $sideImageName;
            if($request->page_side_picture_old && file_exists(public_path('uploads/features/').$request->page_side_picture_old)) {
                unlink(public_path('uploads/features/').$request->page_side_picture_old);
            } 
        }
        
        $pageMainImage = $request->file('home_page_main_picture');
        if($pageMainImage){
            $pageMainImageName = self::getFileName($request->home_page_main_picture->getClientOriginalName()); 
            $request->home_page_main_picture->move(public_path('uploads/features'), $pageMainImageName);
            $data['home_page_main_picture'] = $pageMainImageName;
            if($request->home_page_main_picture_old && file_exists(public_path('uploads/features/').$request->page_main_picture_old)) {
                unlink(public_path('uploads/features/').$request->home_page_main_picture_old);
            } 
        }
        
        if($request->radioList=='v1')
        {
            $data['status']='Active';
        }
        else
        {
            $data['status']='Inactive';
        }
        
            CompanyFeatures::where('id', $featureId) -> where('user_id', \Auth::User()->id) 
               ->update($data);
            $request->session()->flash('success', 'Featured Programs Content updated successfully.');
            return redirect('user/featureedit');
        }
        
    }
    
    public function getFeatureFirst() {
        
        $DATE_FORMAT = env('DATE_FORMAT_DMY');
        
        $userId = \Auth::User()->id;
        // $pageData['com_name'] = CompanyProfile::where('user_id', $userId)->select('company_profile.com_name')
        // ->first()->com_name;
        // dd($pageData['com']);
        // $companyName = \Auth::CompanyProfile()->id;
        $pageData['list'] = CompanyFeatures::where('user_id', $userId)
            ->orderBy('id', 'ASC')->offset(0)->limit(1)
            ->first(['*', \DB::raw("DATE_FORMAT(updated_at, '$DATE_FORMAT') as created_at_display ")]);
        
        return view('userpages/feature-view')->with($pageData);
    }
    public function getFeatureSecond() {
        $DATE_FORMAT = env('DATE_FORMAT_DMY');
        $userId = \Auth::User()->id;
        // $pageData['com_name'] = CompanyProfile::where('user_id', $userId)->select('company_profile.com_name')
        // ->first()->com_name;
        $pageData['list'] = CompanyFeatures::where('user_id', $userId)->orderBy('id', 'ASC')->offset(1)->limit(1)->first(['*', \DB::raw("DATE_FORMAT(updated_at, '$DATE_FORMAT') as created_at_display ")]);
        return view('userpages/feature-view')->with($pageData);
    }
    public function getFeatureThird() {
        $DATE_FORMAT = env('DATE_FORMAT_DMY');
        $userId = \Auth::User()->id;
        // $pageData['com_name'] = CompanyProfile::where('user_id', $userId)->select('company_profile.com_name')
        // ->first()->com_name;
        $pageData['list'] = CompanyFeatures::where('user_id', $userId)->orderBy('id', 'ASC')->offset(2)->limit(1)->first(['*', \DB::raw("DATE_FORMAT(updated_at, '$DATE_FORMAT') as created_at_display ")]);
        return view('userpages/feature-view')->with($pageData);
    }
    
    private function getFileName($fileName = ''){
        if(empty($fileName))
            return null;
        
        $nameArray = explode(".", $fileName);
        $count = count($nameArray)-1;
        $type = $nameArray[$count];
        unset($nameArray[$count]);
        $name = implode(" ", $nameArray);
        return time().'_'.str_replace ([" "], ["_"] , $name).'.'.$type;
    }
    // admin dashboard feature

    public function getFeature(Request $request)
    {
        // return \Datatables::of(Users::join('company_profile', 'users.id', '=', 'company_profile.user_id')->select('company_profile.*','users.id','users.name','users.email'))->make(true); 
        return \Datatables::of(Users::join('company_profile', 'users.id', '=', 'company_profile.user_id')
            ->join('company_features', 'users.id', '=', 'company_features.user_id')
            ->select('company_profile.com_name','company_features.id as feature_id','company_features.user_id','company_features.feature_program_name','company_features.created_at','users.id','users.name','users.email'))->make(true);  
        // return \Datatables::of(CompanyFeatures::select(['company_features.id','company_features.feature_program_name','company_features.created_at']))->make(true); 
        // $d['he'] = CompanyFeatures::select('company_features.*')->first();       
        // dd($d['he']);  
    }

    public function editFeature($id)
    {
        $data['page_title'] = 'Edit Feature Template';
        $data['template'] = CompanyFeatures::select('company_features.*')->where('company_features.id',$id)->first();
        // dd($data['template']);
        // dd($data['template']);
        // dd($data['template']);
        // $data['template'] = Users::join('company_profile', 'users.id', '=', 'company_profile.user_id')->select('company_profile.*')->where(['company_profile.user_id'=>$id])->first();
        // dd($data['template']);
        // if($data['comphone_number']=='')
        // {
        //     $data['comphone_number']='+65';
        // }  
        return view('admin.feature-template.editfeature1')->with($data);
    }

    public function Feature1save(Request $request,$id) {
        
        $validator = \Validator::make($request->all(), [
            'feature_program_name' => 'required|max:255|regex:/^[A-Za-z0-9 ]*$/',
            'feature_tag_line' => 'required|max:140',
            'feature_bios' => 'required|max:3000',
            'feature_highlight1' => 'required|max:400|regex:/^[A-Za-z0-9 ]*$/',
            'feature_highlight2' => 'required|max:400|regex:/^[A-Za-z0-9 ]*$/',
            'feature_highlight3' => 'required|max:400|regex:/^[A-Za-z0-9 ]*$/',
            'page_main_picture' => 'required_if:page_main_picture_old,'.null,
            'page_main_picture_old' => 'required_if:page_main_picture,'.null,
            'page_side_picture' => 'required_if:page_side_picture_old,'.null,
            'page_side_picture_old' => 'required_if:page_side_picture,'.null,
            'home_page_main_picture' => 'required_if:home_page_main_picture_old,'.null,
            'home_page_main_picture_old' => 'required_if:home_page_main_picture,'.null,
            'feature_testimony_name' => 'required_with:feature_testimony|max:255',
            'feature_testimony_designation' => 'required|max:255',
            'feature_testimony' => 'required_with:feature_testimony_name',
            'feature_testimony' => 'required_with:feature_testimony_designation',
            'feature_testimony' => 'nullable|max:140',
        ], [], [
            'feature_program_name.required' => 'Please enter Title.',
            'feature_tagline.required' => 'Please enter Description.',
        ]);
        
        // $featureId = $request->feature_info;
        
        // \Session::put('activeTab', $request->form_name);
        
        $mainImage = $request->file('page_main_picture');
        $validator->after(function ($v) use ($request, $mainImage) {
            $allowExt = ['jpeg' ,'png', 'jpg'];
            if ($mainImage) { 
                $ext = $request->page_main_picture->getClientOriginalExtension();
                $imageSize = @($mainImage->getSize()/1024); // Kb
                list($width ,$height) = getimagesize($mainImage->getPathName());
                $ext = strtolower($ext);
                if(!in_array($ext, $allowExt)){
                    $v->errors()->add('page_main_picture', "Please upload a image file instead of a .".$ext." file!");
                } else if($imageSize > 200){
                    $v->errors()->add('page_main_picture', "Your image size must be less then 200 KB");
                }else if($width > 1170 || $height >780 ){
                    $v->errors()->add('page_main_picture', "Please Select 1170 (w) x 780 (h) pixels");
                }
            }
        });

        $sideImage = $request->file('page_side_picture');
        $validator->after(function ($v) use ($request, $sideImage) {
            $allowExt = ['jpeg' ,'png', 'jpg'];
            if ($sideImage) { 
                $ext = $request->page_side_picture->getClientOriginalExtension();
                $imageSize = @($sideImage->getSize()/1024); // Kb
                list($width ,$height) = getimagesize($sideImage->getPathName());
                $ext = strtolower($ext);
                if(!in_array($ext, $allowExt)){
                    $v->errors()->add('page_side_picture', "Please upload a image file instead of a .".$ext." file!");
                } else if($imageSize > 80){
                    $v->errors()->add('page_side_picture', "Your image size must be less then 200 KB");
                }else if($width > 270 || $height >386 ){
                    $v->errors()->add('page_side_picture', "Please Select 270 (w) x 386 (h) pixels");
                }
            }
        });
        
        $pageMainImage = $request->file('home_page_main_picture');
        $validator->after(function ($v) use ($request, $pageMainImage) {
            $allowExt = ['jpeg' ,'png', 'jpg'];
            if ($pageMainImage) { 
                $ext = $request->home_page_main_picture->getClientOriginalExtension();
                $imageSize = @($pageMainImage->getSize()/1024); // Kb
                list($width ,$height) = getimagesize($pageMainImage->getPathName());
                $ext = strtolower($ext);
                if(!in_array($ext, $allowExt)){
                    $v->errors()->add('home_page_main_picture', "Please upload a image file instead of a .".$ext." file!");
                } else if($imageSize > 340){
                    $v->errors()->add('home_page_main_picture', "Your image size must be less then 200 KB");
                }else if($width > 1920 || $height >1000 ){
                    $v->errors()->add('home_page_main_picture', "Please Select 1170 (w) x 780 (h) pixels");
                }
            }
        });
        if ($validator->fails()) {
             return redirect()->back()->withErrors($validator, 'feature1')->withInput();
        } 
        else {
            $data = $request->only([
            'feature_program_name',
            'feature_tag_line', 
            'feature_bios',
            'feature_testimony',
            'feature_testimony_name',
            'feature_testimony_designation',
            'feature_highlight1',
            'feature_highlight2',
            'feature_highlight3',
        ]);}
        // else if($featureId){
        //     $data = $request->only(['feature_program_name','feature_tag_line', 'feature_bios',
        //                             'feature_testimony', 'feature_testimony_name', 'feature_testimony_designation',
        //                             'feature_highlight1', 'feature_highlight2', 'feature_highlight3']);
            
        $mainImage = $request->file('page_main_picture');
        if($mainImage){
            $imageName = self::getFileName($request->page_main_picture->getClientOriginalName());
            $request->page_main_picture->move(public_path('uploads/features'), $imageName);
            $data['page_main_picture'] = $imageName;
            if($request->page_main_picture_old && file_exists(public_path('uploads/features/').$request->page_main_picture_old)) {
                unlink(public_path('uploads/features/').$request->page_main_picture_old);
            } 
        }
        
        $sideImage = $request->file('page_side_picture');
        if($sideImage){
            $sideImageName = self::getFileName($request->page_side_picture->getClientOriginalName()); 
            $request->page_side_picture->move(public_path('uploads/features'), $sideImageName);
            $data['page_side_picture'] = $sideImageName;
            if($request->page_side_picture_old && file_exists(public_path('uploads/features/').$request->page_side_picture_old)) {
                unlink(public_path('uploads/features/').$request->page_side_picture_old);
            } 
        }
        
        $pageMainImage = $request->file('home_page_main_picture');
        if($pageMainImage){
            $pageMainImageName = self::getFileName($request->home_page_main_picture->getClientOriginalName()); 
            $request->home_page_main_picture->move(public_path('uploads/features'), $pageMainImageName);
            $data['home_page_main_picture'] = $pageMainImageName;
            if($request->home_page_main_picture_old && file_exists(public_path('uploads/features/').$request->page_main_picture_old)) {
                unlink(public_path('uploads/features/').$request->home_page_main_picture_old);
            } 
        }
        
            CompanyFeatures::where('id', $id)->update($data);
            return redirect('admin/feature-template');
            // $request->session()->flash('success', 'Featured Programs Content updated successfully.');
            // return redirect('user/featureedit');
        // }        
    }

    public function editFeature2($id)
    {
        $data['page_title'] = 'Edit Feature2 Template';
        $data['template'] = CompanyFeatures::select('company_features.*')->where('company_features.id',$id)->first();
        return view('admin.feature-template.editfeature2')->with($data);
    }

    public function editFeature3($id)
    {
        $data['page_title'] = 'Edit Feature3 Template';
        $data['template'] = CompanyFeatures::select('company_features.*')->where('company_features.id',$id)->first();
        return view('admin.feature-template.editfeature3')->with($data);
    }

    // public function publishSave(Request $request)
    // {
    //     $userid=\Auth::User()->id;
    //     $pub = array(
    //     'status' => $request->get('hid1'),
    //     );
    //     CompanyFeatures::where('user_id', $userid)->update($pub);
    //     return redirect('user/featureedit');
    // }
}
