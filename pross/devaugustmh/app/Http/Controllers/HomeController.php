<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Response;
class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['banner'] = array() ; //Banner::select(['banner_image','banner_title'])->where(['banner_type'=>'HOME'])->first();

        $tolatNews = \App\Models\News::select()->count();
        $pages =  ceil($tolatNews/8);
        $data['pages'] = $pages;
    
        $settings = \App\Models\Settings::all();
        
        foreach ($settings as $key => $value) {
            $data['setting'][$value->key] = $value->value;
        }
        $data['setting'] = (object)$data['setting'];
        
        $data['banner_image'] = \App\Models\Banners::select()->orderByRaw('RAND()')->first();
        
        $data['projects'] = \App\Models\Projects::select()->orderBy('id', 'DESC')->get()->toArray();
        
        $data['news'] = \App\Models\News::select()->orderBy('id', 'DESC')->offset(0)->limit(8)->get()->toArray();
        
        $data['ourTeams'] = \App\Models\Teams::select()->orderBy('id', 'DESC')->get()->toArray();
        $data['whatdowedos'] = \App\Models\Whatdowedo::select()->orderBy('id', 'DESC')->get()->toArray();
        
        return view('front/index')->with($data); 
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
    
    public function addSubscribe(Request $request)
    {
        if (!$request->ajax()) {
            return redirect()->back()->with('success', 'Please try again.');
        }
        $validator = \Validator::make($request->all(), ['subscribe_email' => 'required|email'],
                                      [], ['subscribe_email' => 'Enter Your Email' ]);
        
        
        $validator->after(function ($v) use ($request) {
               $email = $request-> subscribe_email;
               if($email) {
                    $row = \App\Models\Subscribe::select()->where('subscribe_email', $email)->count();
                    if($row>0) {
                         $v->errors()->add('subscribe_email', 'You have already Subscribed.');
                    }
               }
               
               
        });
        
        if ($validator->fails()) {
            
            return Response::json(['errors'=>implode('<br>',$validator->errors()->all()),'status'=>'failed']);
        }
        $data = $request->only('subscribe_email');
        \App\Models\Subscribe::create($data);
        
        
        $emailData['email'] = $request->subscribe_email;
        $emailData['name']  = 'User';
        
        send_email($emailData['email'],sprintf("%s",$request->subscribe_email),'subscribe',$emailData);
        
        return Response::json(['status' => 'success', 'message' => 'Your subscription has been posted successfully.']);
    }
    

    public function addcontact(Request $request)
    {
        if (!$request->ajax()) {
            return redirect()->back()->with('success', 'Please try again.');
        }
        $validator = \Validator::make($request->all(), ['user_name' => 'required', 'user_email' => 'required|email', 'message' => 'required'],
                                      [], ['user_name' => 'Name', 'user_email' => 'Email', 'message' => 'Message' ]);
        if ($validator->fails()) {
            
            return Response::json(['errors'=>implode('<br>',$validator->errors()->all()),'status'=>'failed']);
        }
        $data = $request->only('user_name', 'user_email', 'subject', 'message');
        \App\Models\Contact::create($data);
        
        $emailData['enquiry'] = $request->message;
        $emailData['email'] = $request->user_email;
        $emailData['name'] = $request->user_name;
        
        send_email($request->user_email,sprintf("%s",$request->user_name),'contact_us_admin',$emailData);
        send_email($request->user_email,sprintf("%s",$request->user_name),'contact_us',$emailData);
        
        
        return Response::json(['status' => 'success', 'message' => 'Your inquiry has been posted successfully.']);
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
    public function newsLoadMore () {
        $pages = 1;
        $pages =  $_REQUEST['pages'];
        $ofset = ($pages-1)*8;
        
        $newsLists = \App\Models\News::select()->orderBy('id', 'DESC')->offset($ofset)->limit(8)->get()->toArray();
        $html = '';
        foreach($newsLists as $new){
			$html .= '<div class="col-md-3  text-left">
					<img class="img-responsive picsGall" src=""/>
					<h3><a href="'.$new['news_url'].'?iframe=true&amp;width=90%&amp;height=90%" rel="prettyPhoto[iframe]">'.$new['title'].'</a></h3>
					<ul>
						<li><i class="fa fa-calendar"></i>'.date('F d, Y', strtotime($new['created_at'])).'</li>
					</ul>
					<p>'.$new['description'].' ... <a href="'.$new['news_url'].'?iframe=true&amp;width=90%&amp;height=90%" rel="prettyPhoto[iframe]">Read More <em class="fa fa-angle-right"></em></a></p>
					<hr class="hrNews">
				</div>';
        }
        echo $html;
                
    }
}
