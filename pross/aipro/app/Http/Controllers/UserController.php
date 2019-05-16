<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Users;
use App\Models\CompanyProfile;
use App\Models\CompanyFeatures;
use Auth;
use Hash;
use Mail;
use Response;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userid=\Auth::User()->id;
        $user_company_data = CompanyProfile::where('user_id',$userid)
          ->join('users', 'users.id', '=', 'company_profile.user_id')->select('users.name','users.designation','users.bios','users.designation',
            \DB::raw("DATE_FORMAT(users.created_at, '%b %d,%Y') as date "),
            'company_profile.com_name','company_profile.com_url','users.surname',
            'users.facebook_url','users.linkedIn_url','users.twitter_url',
            'company_profile.categories','company_profile.services',
            'company_profile.com_testimony','company_profile.testimonial_name','company_profile.testimonial_designation',
            'company_profile.com_headline', 'company_profile.com_write_up','company_profile.poster_pic')->first()->toArray();
        // dd($rrrr);
        // $company_data=DB::table('company_profile')->where('user_id',$ii)->select('*')->get();
        $pageData['comdata'] = $user_company_data;
        $pageData['title'] = 'Connect';
        return view('userpages/user-profile')->with($pageData); 
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
        $pageData['title'] = 'Connect';
        return view('userpages/user-profile-edit', compact('pageData')); 
        
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

    public function userProfileEdit () 
    {
        $userId = \Auth::User()->id;
        $userData = Users::leftjoin('company_profile', 'users.id', '=', 'company_profile.user_id')
                ->where('users.id',$userId)->select('*')
                ->first()->toArray();
        if($userData['comphone_number']=='')
        {
            $userData['comphone_number']='+65';
        }  
        if($userData['userphone_number']=='')
        {
            $userData['userphone_number']='+65';
        }        
        $pageData['categories']= getCategories();
        $pageData['services']= getServices();
        $pageData['userdata'] = $userData;
       
        return view('userpages/user-profile-edit')->with($pageData); 
        
    }
    
    /*
     * Member Details
    */
    public function userProfileEditSave (Request $request)
    {
        $userid=\Auth::User()->id;
        $validator = \Validator::make($request->all(), [
           'member_first_name' => 'required|max:255|regex:/^[A-Za-z0-9 ]*$/',
           'member_surname' => 'required|max:255|regex:/^[A-Za-z0-9 ]*$/',
           'member_designation' => 'required|max:255',
           'member_email' => 'required|email|unique:users,email,'.$userid,
           'member_phone' => 'required|regex:/^[0-9\+]{11,11}$/',
           'member_profilepic' => 'required',
           'member_profilepic' => 'required_if:member_profilepic_old,'.null,
           'member_profilepic_old' => 'required_if:member_profilepic,'.null,
           'member_bios' => 'required',
           'member_facebook' => 'nullable|url',
           'member_twitter' => 'nullable',
           'member_linkedin' => 'nullable|url',
          
           // 'feature_tagline' => 'required'
        ], [], [
           // 'member_first_name.required' => 'Please enter name.',
           // 'featur->first()->toArray()e_tagline.required' => 'Please enter Description.',
        ]);

       

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
             \Session::put('activeTab', 'feature3');
            return redirect()->back()->withErrors($validator, 'feature1')->withInput();
        } 
        else 
        {
             \Session::put('activeTab', 'feature4');  
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
                //'profile_picture'    => $imageName,
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
            // DB::table('users')->where('id',$i)->update($form_content);
            // dd();
             return redirect('user/profileedit');
        }
       
   // }
        // $pageData['title'] = 'Connect';
       // return view('userpages/user-profile-edit', compact('pageData')); 
    }
    
    /*
     *Company Details
     */
    public function empProfileEditSave (Request $request) 
    {
         $validator = \Validator::make($request->all(), [
            'company_name' => 'required|max:255',
            'comany_url' => 'required|url',
            'comany_roadaddress' => 'required|max:255|regex:/^[A-Za-z0-9 ]*$/',
            'comany_unitaddress' => 'required|max:255',
            'company_postalcode_address' => 'required|digits:6',
            'company_email' => 'nullable|email',
            'company_phone' => 'required|regex:/^[0-9\+]{11,11}$/',
            'company_fax' => 'nullable|numeric',
            'company_facebook' => 'nullable|url',
            'company_twitter' => 'nullable',
            'company_linkedin' => 'nullable|url', 
            'company_headline' => 'nullable|max:140',
            'activity' => 'required|max:5',
            'service' => 'required|max:5',
            'company_bios' => 'required|max:2000',
            'testimony_name' => 'required_with:company_testimony|max:255',
            'testimony_designation' => 'required_with:company_testimony|max:255',
            'company_testimony' => 'required_with:testimony_name',
            'company_testimony' => 'required_with:testimony_designation',
            'company_testimony' => 'nullable|max:140',
           
        ], [], [
              // 'activity[].required' => 'Please enter min 5.',
              // 'min.required' => 'Please enter min 5.',
        ]);

        if ($validator->fails()) 
        { 
            \Session::put('activeTab', 'feature1');
            return redirect()->back()->withErrors($validator, 'feature1')->withInput();
        } 
        else 
        {
            \Session::put('activeTab', 'feature2');
            $compid=\Auth::User()->id;
            
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
            CompanyProfile::com_Change($compid,$com_form_content);
            
            return redirect('user/profileedit');
        }
    }
    
     public function empPosterProfilePicSave (Request $request) 
    {
        $compid=\Auth::User()->id;
        $validator = \Validator::make($request->all(), [
            // 'feature_profilepic' => 'required',
           'feature_profilepic' => 'required_if:feature_profilepic_old,'.null,
           'feature_profilepic_old' => 'required_if:feature_profilepic,'.null,
        ], [], [
              // 'activity[].required' => 'Please enter min 5.',
              // 'min.required' => 'Please enter min 5.',
        ]);

        $mainImage = $request->file('feature_profilepic');
        $validator->after(function ($v) use ($request, $mainImage) {
        $allowExt = ['png','jpg','jpeg'];
        if ($mainImage) { 
        $ext = $request->feature_profilepic->getClientOriginalExtension();
        $imageSize = @($mainImage->getSize()/1024); // Kb
        list($width ,$height) = getimagesize($mainImage->getPathName());
        $ext = strtolower($ext);
        if(!in_array($ext, $allowExt)){
        $v->errors()->add('feature_profilepic', "Please upload a image file instead of a .".$ext." file!");
        } else if($imageSize > 340){
        $v->errors()->add('feature_profilepic', "Your image size must be less then 340 KB");
        }else if($width > 1170 || $height > 658 ){
        $v->errors()->add('feature_profilepic', "Please Select 1170 (w) x 658 (h) pixels");
        }
        }
        });

        if ($validator->fails()) 
        {   
            \Session::put('activeTab', 'feature2');
            return redirect()->back()->withErrors($validator, 'feature1')->withInput();
        } 
        else 
        {
            \Session::put('activeTab', 'feature3');
            
            // dd($compid);
            $mainImage = $request->file('feature_profilepic');
            if($mainImage)
            {
                $imageName = $mainImage->getClientOriginalName();
                $mainImage->move(public_path('/uploads/features/'), $imageName);
                $com_form_content['poster_pic'] = $imageName;
                if($request->feature_profilepic_old && file_exists(public_path('/uploads/features/').$request->feature_profilepic_old)) 
                {
                    unlink(public_path('/uploads/features/').$request->feature_profilepic_old);
                } 
            CompanyProfile::com_Change($compid,$com_form_content);             
            }
            return redirect('user/profileedit');
        }    
    }  

     
    public function pubSave(Request $request)
    {
        $userid=\Auth::User()->id;
        $pub = array(
        'com_status' => $request->get('hid1'),
        );
        // dd($userid);
        CompanyProfile::com_Change($userid,$pub);
        return redirect('user/profileedit');
    }

    public function insSave(Request $request)
    {
        $pass = bcrypt('aipro@123');
	die();
        $user_content[] = array(    
            'name'              => 'Tracy Chua',
            'email'             => 'tracy@18degreescelsius.com',
            'userphone_number'  => '+6597451805',
            'password'          => $pass,
            'com_name'          => '18 Degrees Celsius Pte Ltd',
            'road_address'      => '10 Anson Roa, #26-04 Singapore - 079903',
            'postal_code'       => '079903',
        );
        $user_content[] = array(    
            'name'              => 'Erezuwan Yunos Ibrahim',
            'email'             => 'erez@adarapictures.com',
            'userphone_number'  => '+6596440914',
            'password'          => $pass,
            'com_name'          => 'Adara Pictures Pte Ltd',
            'road_address'      => '50 Frontier Building #05-06 Ubi Ave 3 Singapore',
            'postal_code'       => '408866',
        );
        $user_content[] = array(    
            'name'              => 'Kavitah Jayanandan',
            'email'             => 'kavitah@ananyapictures.sg',
            'userphone_number'  => '+6593842037',
            'password'          => $pass,
            'com_name'          => 'Ananya Pictures',
            'road_address'      => '',
            'postal_code'       => '',
        );
        $user_content[] = array(    
            'name'              => 'Jyotirmoy Saha',
            'email'             => 'moy@augustmh.com',
            'userphone_number'  => '+6565920577',
            'password'          => $pass,
            'com_name'          => 'August Media Holding Pte Ltd',
            'road_address'      => '71 Ayer Rajah Crescent #07-12/14 Ayer Rajah Industrial Estate',
            'postal_code'       => '139951',
        );
        $user_content[] = array(    
            'name'              => 'Phang Kien Yip',
            'email'             => 'phangko@broncomedia.com',
            'userphone_number'  => '+6597377782',
            'password'          => $pass,
            'com_name'          => 'Bronco Media House',
            'road_address'      => 'Block 125 Bukit Merah Lane 1 #04-172 Alexandra Village Singapore',
            'postal_code'       => '150125',
        );
        $user_content[] = array(    
            'name'              => 'Jaya Rathakrishnan',
            'email'             => 'jaya@comicbook.com.sg',
            'userphone_number'  => '+656702 2461',
            'password'          => $pass,
            'com_name'          => 'Comicbook Private Limited (new)',
            'road_address'      => '',
            'postal_code'       => '',
        );
        $user_content[] = array(    
            'name'              => 'Huang Yushan',
            'email'             => 'info@digitalblowfish.com',
            'userphone_number'  => '+6562272779',
            'password'          => $pass,
            'com_name'          => 'Digital Blowfish Pte Ltd (new)',
            'road_address'      => '62 Ubi Road 1 #05-20121 Oxley Biz Hub2',
            'postal_code'       => '408734',
        );
        $user_content[] = array(    
            'name'              => 'Kenneth Liang',
            'email'             => 'kenneth.l@dreamforest.com',
            'userphone_number'  => '+656837 2345',
            'password'          => $pass,
            'com_name'          => 'Dream Forest Media',
            'road_address'      => '56 Prinsep St, Singapore',
            'postal_code'       => '188685',
        );
        $user_content[] = array(    
            'name'              => 'Kathy Lee',
            'email'             => 'kathy@filmat36.com',
            'userphone_number'  => '+6562561982',
            'password'          => $pass,
            'com_name'          => 'Filmat36 (S) Pte Ltd',
            'road_address'      => '501 Balestier Road #02-03 Wai Wing Centre',
            'postal_code'       => '329844',
        );
        $user_content[] = array(    
            'name'              => 'Mark Chua',
            'email'             => 'marko@freeflow.com.sg',
            'userphone_number'  => '+6596741069',
            'password'          => $pass,
            'com_name'          => 'Freeflow Productions Pte Ltd',
            'road_address'      => '89 Neil Road, #01-01, Singapore',
            'postal_code'       => '088849',
        );
        $user_content[] = array(    
            'name'              => 'Gozde Zehnder',
            'email'             => 'gozde@freestatesite.com',
            'userphone_number'  => '+6564447073',
            'password'          => $pass,
            'com_name'          => 'Freestate ProductionsGozde Zehnder',
            'road_address'      => '47 Kallang Pudding Road The Crescent #05-07',
            'postal_code'       => '349318',
        );
        $user_content[] = array(    
            'name'              => 'Bratina Tay',
            'email'             => 'bratina@hoods-inc.com',
            'userphone_number'  => '+6567297987',
            'password'          => $pass,
            'com_name'          => 'Hoods Inc Productions Pte Ltd.Bratina Tay',
            'road_address'      => '1 Spottiswoode Park Road',
            'postal_code'       => '088628',
        );
        $user_content[] = array(    
            'name'              => 'Panuksmi Hardjowirogo',
            'email'             => 'panuksmi@margofilms.com',
            'userphone_number'  => '+6563331955',
            'password'          => $pass,
            'com_name'          => 'M\'go Films Pte Ltd',
            'road_address'      => '420 North Bridge Road #03-39 North Bridge Centre',
            'postal_code'       => '188727',
        );
        $user_content[] = array(    
            'name'              => 'Jeevan/Audrey',
            'email'             => 'jeevan@monochromaticpictures.com',
            'userphone_number'  => '+6598305636',
            'password'          => $pass,
            'com_name'          => 'Monochromatic Pictures LLP',
            'road_address'      => 'Link @ AMK 3 Ang Mo Kio St 62 #08-16',
            'postal_code'       => '569139',
        );
        $user_content[] = array(    
            'name'              => 'Kenneth Goh',
            'email'             => 'kenneth@monstrou.com',
            'userphone_number'  => '+6591479132',
            'password'          => $pass,
            'com_name'          => 'Monstrou Studio Pte Ltd',
            'road_address'      => '33 Ubi Avenue 3, Vertex, Tower A, #08-49, Singapore ',
            'postal_code'       => '408868',
        );
        $user_content[] = array(    
            'name'              => 'Lai Jason',
            'email'             => 'laijason@oak3films.com',
            'userphone_number'  => '+6562262338',
            'password'          => $pass,
            'com_name'          => 'Oak3 Films Pte Ltd',
            'road_address'      => '18 Kaki Bukit 3 #04-09 ',
            'postal_code'       => '',
        );
        $user_content[] = array(    
            'name'              => 'Pedro Tan',
            'email'             => 'pedrotan@ochrepictures.com',
            'userphone_number'  => '+6598160859',
            'password'          => $pass,
            'com_name'          => 'Ochre Pictures Pte Ltd',
            'road_address'      => '37 Jalan Pemimpin #06-07 Mapex',
            'postal_code'       => '577177',
        );
        $user_content[] = array(    
            'name'              => 'M Raihan Halim',
            'email'             => 'raihan@papahanfilms.com',
            'userphone_number'  => '+6568468408',
            'password'          => $pass,
            'com_name'          => 'Papahan Films Pte Ltd',
            'road_address'      => '35 Kallang Pudding Road #03-05 Tong Lee Building A Singapore ',
            'postal_code'       => '349314',
        );
        $user_content[] = array(    
            'name'              => 'Inez Ang',
            'email'             => 'hello.inezang@gmail.com',
            'userphone_number'  => '+6585336931',
            'password'          => $pass,
            'com_name'          => 'People Factor Studio Pte Ltd',
            'road_address'      => '33M Gilstead Road',
            'postal_code'       => '309076',
        );
        $user_content[] = array(    
            'name'              => 'Rita Zahara',
            'email'             => 'rita@reta.com.sg',
            'userphone_number'  => '+6597629491',
            'password'          => $pass,
            'com_name'          => 'Reta Transmedia Storytelling',
            'road_address'      => 'LaunchPad @ One-North, Blk 79 Ayer Rajah Crescent #02-08, Singapore',
            'postal_code'       => '139955',
        );
        $user_content[] = array(    
            'name'              => 'Sujimy Mohamad',
            'email'             => 'sujimy@screenbox.com.sg',
            'userphone_number'  => '+6563242463',
            'password'          => $pass,
            'com_name'          => 'Screenbox Pte Ltd',
            'road_address'      => '1 Bukit Batok Crescenet #09-56 WCEGA Plaza',
            'postal_code'       => '658064',
        );
        $user_content[] = array(    
            'name'              => 'Aileen Chan',
            'email'             => 'aileen@singaporecinema.com',
            'userphone_number'  => '+6563444966',
            'password'          => $pass,
            'com_name'          => 'Singapore Cinema Pte Ltd (new)',
            'road_address'      => '',
            'postal_code'       => '',
        );
        $user_content[] = array(    
            'name'              => 'Tan Chih Chong',
            'email'             => 'chihchong@sittinginpictures.com',
            'userphone_number'  => '+6596827855',
            'password'          => $pass,
            'com_name'          => 'Sitting in Pictures',
            'road_address'      => '1 Syed Alwi Road #04-04 Song Lin Building',
            'postal_code'       => '207628',
        );
        $user_content[] = array(    
            'name'              => 'JK Saravana',
            'email'             => 'jksaravana@tantrainc.sg',
            'userphone_number'  => '+6563334542',
            'password'          => $pass,
            'com_name'          => 'Tantra Incorporated Pte Ltd',
            'road_address'      => '1 Ubi Cres, Singapore',
            'postal_code'       => '408563',
        );
        $user_content[] = array(    
            'name'              => 'Joan Chee',
            'email'             => 'joanchee5@gmail.com',
            'userphone_number'  => '+6597554840',
            'password'          => $pass,
            'com_name'          => 'The Big Picture Productions',
            'road_address'      => 'Alnwick Road 12  55 Singapore - Serangoon',
            'postal_code'       => '',
        );
        $user_content[] = array(    
            'name'              => 'Khim Loh, MD',
            'email'             => 'info2@tmvc.sg',
            'userphone_number'  => '+6563333051',
            'password'          => $pass,
            'com_name'          => 'The Moving Visuals Co Pte Ltd',
            'road_address'      => '2 Kallang Avenue #04-08 CT Hub 1',
            'postal_code'       => '339407',
        );
        $user_content[] = array(    
            'name'              => 'Mohamed Ali',
            'email'             => 'mohamedali@themedia.com.sg',
            'userphone_number'  => '+6598372456',
            'password'          => $pass,
            'com_name'          => 'The Media Pte Ltd',
            'road_address'      => '59 Jalam Pemimpin @03-07 L&Y Building ',
            'postal_code'       => '577218',
        );
        $user_content[] = array(    
            'name'              => 'Han Kwang Wei',
            'email'             => 'kwangwei@threesixzero.com.sg',
            'userphone_number'  => '+6568843875',
            'password'          => $pass,
            'com_name'          => 'Threesixzero Productions Pte Ltd',
            'road_address'      => '26 Sin Ming Lane, Midview City #06-123',
            'postal_code'       => '573971',
        );
        $user_content[] = array(    
            'name'              => 'Rehina Pereira',
            'email'             => 'rehina@veriteproductions.com',
            'userphone_number'  => '+6564711809',
            'password'          => $pass,
            'com_name'          => 'Verite Productions',
            'road_address'      => '20 Ayer Rajah Crescent #08-28',
            'postal_code'       => '139964',
        );
        $user_content[] = array(    
            'name'              => 'Elvin Chuwa',
            'email'             => 'elvin@vertigo.com.sg',
            'userphone_number'  => '+6596861919',
            'password'          => $pass,
            'com_name'          => 'Vertigo Pictures LLP',
            'road_address'      => '217A Syed Alwi Road',
            'postal_code'       => '207776',
        );
        $user_content[] = array(    
            'name'              => 'Vanda Tan',
            'email'             => 'vanda@wawapictures.com.sg',
            'userphone_number'  => '+6563910560',
            'password'          => $pass,
            'com_name'          => 'WaWa Pictures Pte Ltd',
            'road_address'      => '71 Ubi Road 1 #05-42/43/44 Oxley Bizhub',
            'postal_code'       => '408732',
        );
        $user_content[] = array(    
            'name'              => 'TJ Lee',
            'email'             => 'tjlee@weiyufilms.sg',
            'userphone_number'  => '+6596749050',
            'password'          => $pass,
            'com_name'          => 'Weiyu Films Pte Ltd',
            'road_address'      => '37 Jalan Pemimpin #07-01',
            'postal_code'       => '577177',
        );
        $user_content[] = array(    
            'name'              => 'William Lim',
            'email'             => 'william@xtreme.com.sg',
            'userphone_number'  => '+6562231107',
            'password'          => $pass,
            'com_name'          => 'Xtreme Media Pte Ltd',
            'road_address'      => 'Blk 24 Sin Ming Lane #02-01 Midview City',
            'postal_code'       => '573920',
        );
        $user_content[] = array(    
            'name'              => 'Mervyn Lim Jun Yu',
            'email'             => 'mervyn@commune.sg',
            'userphone_number'  => '+65',
            'password'          => $pass,
            'com_name'          => 'Communia Pte Ltd',
            'road_address'      => '8 Eu Tong Sen Street #14-94',
            'postal_code'       => '059818',
        );
        $user_content[] = array(    
            'name'              => 'Gaurav Sharma',
            'email'             => 'roughcutsproductions@gmail.com',
            'userphone_number'  => '+659696 2573',
            'password'          => $pass,
            'com_name'          => 'Rough Cuts Pte Ltd',
            'road_address'      => '233 Joo Chiat #02-01 Road',
            'postal_code'       => '427491',
        );
        $user_content[] = array(    
            'name'              => 'Chow Wai Thong',
            'email'             => 'waithong@augustpictures.com.sg',
            'userphone_number'  => '+6590492373',
            'password'          => $pass,
            'com_name'          => 'August Pictures Pte Ltd',
            'road_address'      => '43 Jalan Merah Saga #03-78',
            'postal_code'       => '278115',
        );
        $user_content[] = array(    
            'name'              => 'Shafie Mustafa',
            'email'             => 'shortmanfilms@gmail.com',
            'userphone_number'  => '+658797 3445',
            'password'          => $pass,
            'com_name'          => 'Shortman Films Pte Ltd',
            'road_address'      => '6001 Beach Rd, #11-09 Golden Mile Tower',
            'postal_code'       => '199589',
        );

        // dd(count($user_content));
        $ids = [];
        foreach ($user_content as $value) {
            $userArray['name']              = $value['name'];
            $userArray['status']            = 'Active';
            $userArray['email']             = $value['email'];
            $userArray['userphone_number']  = $value['userphone_number'];
            $userArray['password']          = $value['password'];
            $userArray['user_type']         = 'company';
                            
            
            $id = Users::create($userArray)->id;
            CompanyProfile::create([
                                    'user_id'       => $id,
                                    'com_name'      => $value['com_name'],
                                    'road_address'  => $value['road_address'],
                                    'postal_code'   => $value['postal_code'],
                                    ]
                                );
           
            CompanyFeatures::create([
                                    'user_id' => $id
                                    ]
                                );
            CompanyFeatures::create([
                                    'user_id' => $id
                                    ]
                                );
            CompanyFeatures::create([
                                    'user_id' => $id
                                    ]
                                );

            $ids[] = $id;

        } 

        dd($ids);
        
    }

    public function userpassEdit () 
    {
        // dd('hello');
        // $userId = \Auth::User()->id;
        // $userData = Users::where('users.id',$userId)->first()->value('password');
        // // dd($userData);
        // $pageData['userdata'] = $userData;  
        return view('userpages/user-profile-changepass'); 
        
    }
    
    public function userupdatepass (Request $request)
    {       
        $userid=\Auth::User()->id;
        $validator = \Validator::make($request->all(), [
           'old_password' => 'required|min:6',
           'new_password' => 'required|min:6|confirmed',
           'new_password_confirmation' => 'required', 
           // 'feature_tagline' => 'required'
        ], [], [
           // 'member_first_name.required' => 'Please enter name.',
           // 'featur->first()->toArray()e_tagline.required' => 'Please enter Description.',
        ]);
// if ($validator->fails()) 
//         { 
//             return redirect()->back()->withErrors($validator, 'feature1')->withInput();
//         } 

        
// $validator->after(function ($validator) {
//     die();
// if ($this->somethingElseIsInvalid()) {
// $validator->errors()->add('field', 'Something is wrong with this field!');
// }
// });     
// dd('wrong');
        // dd($userData);
            // $chck=Hash::check($request->get('old_password'), $userData);
            // var_dump($chck);
            // dd($chck);
        
// $validator = \Validator::make($request->all(), ['date_issued_by_pub' => 'required'], [], ['date_issued_by_pub' => 'Date Issued By PUB']);
# Get the last application data. 
// $lastApplication = Application::select([
// 'id', 'date_applied_by_applicant',
// 'date_received_by_pub', 'approved',
// 'rejected', 'project_id'
// ])
// ->where('project_id', '=', $id)
// ->orderBy('id', 'desc')
// ->first();
// $lastApplication=\Auth::User()->password;
// $validator->after(function ($v) use ($lastApplication) {
// if ($lastApplication->approved == null) {
//     dd('err');
// $v->errors()->add('date_issued_by_pub', 'Application is not approved.');
// }
// else{dd('good');}
// });
// dd('succ');

    
   


        // dd('succ');
        // $userData=\Auth::User()->password;
        // // dd($userData);
        // $oldpass=Hash::make($request->get('old_password'));
        // if(!Hash::check($oldpass, $userData)){
        //     dd('err');
        //          return back()->with('error','The specified password does not match the database password');
        //     }
        // dd('wrong gone');
        if ($validator->fails()) 
        { 
            return redirect()->back()->withErrors($validator, 'feature1')->withInput();
        } 
        else 
        {
            // dd('succ');
            $data['password']=bcrypt($request->get('new_password'));
            Users::where('id', $userid)->update($data);
            return redirect('user/passEdit');
        }
    }
    public function adminpassEdit()
    {
        $data['page_title'] = 'Change Password Template';
        return view('admin.password-template.index')->with($data);
    }
    

    public function adminupdatepass (Request $request)
    {       
        $adminid=\Auth::User()->id;
        $validator = \Validator::make($request->all(), [
           'old_password' => 'required|min:6',
           'new_password' => 'required|min:6|confirmed',
           'new_password_confirmation' => 'required', 
           // 'feature_tagline' => 'required'
        ], [], [
           // 'member_first_name.required' => 'Please enter name.',
           // 'featur->first()->toArray()e_tagline.required' => 'Please enter Description.',
        ]);
        if ($validator->fails()) 
        { 
            return redirect()->back()->withErrors($validator, 'feature1')->withInput();
        } 
        else 
        {
            // dd('succ');
            $data['password']=bcrypt($request->get('new_password'));
            Users::where('id', $adminid)->update($data);
            return redirect('admin/adminchange-password');
        }
    }

    public function resetpassword (Request $request) 
    {
        if (!$request->ajax()) 
        {
            return redirect()->back()->with('success', 'Please try again.');
        }
        $validator = \Validator::make($request->all(), ['email' => 'required|email'],
        [], ['email' => 'Email']);
        if ($validator->fails()) 
        {
            return Response::json(['errors'=>implode('<br>',$validator->errors()->all()),'status'=>'failed']);
        }
       
        else
        {
            $data=$request->email;
            // dd($data);
            $email=Users::where('email', $data)->select('name','email')->first();
            // echo $email['email']; 
            // dd($email);
            if($email!='')
            {    
                $pass['password'] = bcrypt('aipro');
         
                // $emailData['reply'] = $email[''];
                $emailData['name'] = $email['name'];
                $emailData['subject'] = 'Regarding Reset Password'; 
                $emailData['message'] = 'You are recieving this email because we recieved a password reset request for your account.<br/>Your new password is: aipro.<br><br>Please dont share your password with anyone.';
                send_reset_email($email['email'],sprintf("%s",$email['name']),'reset_password',$emailData); 
                $request->session()->flash('success', 'Mail has been send to your email successfully.');

                Users::where('email', $email->email)->update($pass);
                return Response::json(['status' => 'success', 'message' => 'Your New Password has been sent to your email successfully.']);
                // return redirect('admin/adminchange-password');
            }
            else
            {
                return Response::json(['errors' => 'Your email is not correct.']);
                // dd('Wrong Email');
                // return redirect('admin/adminchange-password'); 
            }    
        }
    }

}
