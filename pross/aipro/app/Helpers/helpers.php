<?php
/*
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Admin\Settings;
use App\Common\Process;
use App\Admin\Blog;
use App\Admin\FeaturedPeople;
use Illuminate\Support\Facades\Session;
*/
use Mail;
/** Get Application Setings **/
function get_settings(){
	/*
  $settings = Settings::all();
  foreach ($settings as $key => $value) {
      $data['setting'][$value->key] = $value->value;
  }
  return (object)$data['setting'];
  */
	
	return (object)[];
}

function getCategories(){
	
	return [
			'3d_programmes' 		=> '3D Programmes',
			'4k_ultra_hd' 	        => '4K Ultra HD',
			'animation' 			=> 'Animation',
			'branded_entertainment' => 'Branded Entertainment',
			'docs_factual' 			=> 'Docs & Factual',
			'drama_scripted_format' => 'Drama / Scripted Format',
			'gaming' 		        => 'Gaming',
			'kids_teens' 			=> 'Kids & Teens',
			'motion_pictures' 		=> 'Motion Pictures',
			'music' 			    => 'Music',
			'news' 			        => 'News',
			'non-scripted_formats' 	=> 'Non-Scripted Formats',
			'publishing' 			=> 'Publishing',
			'sports' 			    => 'Sports',
			'vr_ar' 			    => 'VR / AR',
			'others' 			    => 'Others',
			];

}

function getServices(){
	
	return [
		'rights_holder_distributor' 	=> 'Rights Holder / Distributor',
		'production_co_content_creator' => 'Production Co / Content Creator',
		'sales_agent' 					=> 'Sales Agent',
		'licensing_agent' 				=> 'Licensing Agent',
		'book_publisher' 				=> 'Book Publisher',
		'theatrical_distributor' 		=> 'Theatrical Distributor',
		'technology_equipment' 			=> 'Technology / Equipment',
		'content_management' 			=> 'Content Management',
		'2nd_screen_social_tv' 			=> '2nd Screen / Social TV',
		'post_production_studios' 		=> 'Post Production / Studios',
		'financial_activitys' 			=> 'Financial activitys',
		'online_video_platform_mcn' 	=> 'Online Video Platform / MCN',    
		'channel_mobile_ott_operator' 	=> 'Channel / Mobile / OTT Operator',
		'online_publisher' 				=> 'Online Publisher',
		'inflight' 						=> 'Inflight',
		'advertising_pr_media_agency' 	=> 'Advertising / PR / Media Agency',
		'govt_agency_fund' 				=> 'Govt Agency / Fund',
		'talent_or_literary_agency' 	=> 'Talent or Literary Agency',
	];
	
    
}



function time_elapsed_string($datetime, $full = false) {
    $now = new DateTime;
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    $diff->w = floor($diff->d / 7);
    $diff->d -= $diff->w * 7;

    $string = array(
        'y' => 'year',
        'm' => 'month',
        'w' => 'week',
        'd' => 'day',
        'h' => 'hour',
        'i' => 'minute',
        's' => 'second',
    );
    foreach ($string as $k => &$v) {
        if ($diff->$k) {
            $v = $diff->$k . ' ' . $v . ($diff->$k > 1 ? 's' : '');
        } else {
            unset($string[$k]);
        }
    }

    if (!$full) $string = array_slice($string, 0, 1);
    return $string ? implode(', ', $string) . ' ago' : 'just now';
}


function ___configuration($keys = []){
   $config_table = \App\Models\Settings::Select('*');
	
   if(!empty($keys)){
       $config_table->whereIn('key',$keys);
   }

   $configData = $config_table->get()->toArray();

   $data=[];
   foreach ($configData as $key => $value) {
   	 	$data[$value['key']] = $value['value'];
   }
   return $data;
   // return \Shared\Dash::combine((array)$configData,'{n}.key','{n}.value');
}


/** mail sender **/
function send_email($email,$fullname,$template_code,$data,$attachment='') {

   $template = \DB::table('email_template')->select(['subject','description'])->where('title',$template_code)->first();
   // dd($template);
   if(!empty($template_code)){

       $configuration = ___configuration(['smtp_server_host','smtp_port_number','smtp_uName','smtp_uPass','site_title','admin_email']);
       // dd($configuration);
       $subject    = $template->subject;           
       $body       = $template->description;
       // dd($body);
   //     if($template_code == 'subscribe')
   //     {
   //          $patternFind[0] = '/{SITENAME}/';
            
   //          $replaceFind[0] = $configuration['site_title'];
   //     }
			 
			//  if($template_code == 'contact_us')
   //     {
   //          $patternFind[0] = '/{NAME}/';
   //          $patternFind[1] = '/{SITENAME}/';
            
   //          $replaceFind[0] = $data['name'];
   //          $replaceFind[1] = $configuration['site_title'];
   //     }
			
			// if($template_code == 'contact_us_admin')
   //     {
   //          $patternFind[0] = '/{NAME}/';
   //          $patternFind[1] = '/{FROM_EMAIL}/';
   //          $patternFind[2] = '/{MESSAGE}/';
   //          $patternFind[3] = '/{SITENAME}/';
            
   //          $replaceFind[0] = $data['name'];
   //          $replaceFind[1] = $data['email'];
   //          $replaceFind[2] = $data['enquiry'];
   //          $replaceFind[3] = $configuration['site_title'];

   //          $email = $configuration['admin_email'];
   //     }

       if($template_code == 'contact_us_reply')
       {
            $patternFind[0] = '/{NAME}/';
            $patternFind[1] = '/{SUBJECT}/';
            $patternFind[2] = '/{MESSAGE}/';
            $patternFind[3] = '/{REPLY}/';
            $patternFind[4] = '/{SITENAME}/';
            
            $replaceFind[0] = $data['name'];
            $replaceFind[1] = $data['subject'];
            $replaceFind[2] = $data['message'];
            $replaceFind[3] = $data['reply'];
            $replaceFind[4] = $configuration['site_title'];
       }

       

        $subject = $template->subject;
        $txtdesc    = stripslashes($template->description);
        $ebody      = nl2br(preg_replace($patternFind, $replaceFind, $txtdesc));
        $body = html_entity_decode(stripslashes($ebody));  
			
       \Config::set(['port' => $configuration['smtp_port_number'],'host' => $configuration['smtp_server_host'],'username' => $configuration['smtp_uName'],'password' => $configuration['smtp_uPass']]);

       $message = $subject;
       $sender = ['subject' => $subject,'email' => $email,'name' => $data['name'],'attachment'=>$attachment,'from' => ['address' => $configuration['smtp_uName'],'name' => $configuration['site_title']]];

       if(!empty($body) && !empty($email)){
           Mail::send(array('html' => 'email.mail'), ['body' => $body], function($message) use ($sender){
               $message->to(
                   $sender['email'], 
                   $sender['name']
               )
               ->subject($sender['subject'])
               ->from(
                   $sender['from']['address'],
                   $sender['from']['name']
               );
           });
       }
   }
}



// forgot password email
/** mail sender **/
function send_reset_email($email,$fullname,$template_code,$data,$attachment='') {

   $template = \DB::table('email_template')->select(['subject','description'])->where('title',$template_code)->first();
   // dd($template);
   if(!empty($template_code)){

       $configuration = ___configuration(['smtp_server_host','smtp_port_number','smtp_uName','smtp_uPass','site_title','admin_email']);
       // dd($configuration);
       $subject    = $template->subject;           
       $body       = $template->description;
       // dd($body);
   //     if($template_code == 'subscribe')
   //     {
   //          $patternFind[0] = '/{SITENAME}/';
            
   //          $replaceFind[0] = $configuration['site_title'];
   //     }
       
      //  if($template_code == 'contact_us')
   //     {
   //          $patternFind[0] = '/{NAME}/';
   //          $patternFind[1] = '/{SITENAME}/';
            
   //          $replaceFind[0] = $data['name'];
   //          $replaceFind[1] = $configuration['site_title'];
   //     }
      
      // if($template_code == 'contact_us_admin')
   //     {
   //          $patternFind[0] = '/{NAME}/';
   //          $patternFind[1] = '/{FROM_EMAIL}/';
   //          $patternFind[2] = '/{MESSAGE}/';
   //          $patternFind[3] = '/{SITENAME}/';
            
   //          $replaceFind[0] = $data['name'];
   //          $replaceFind[1] = $data['email'];
   //          $replaceFind[2] = $data['enquiry'];
   //          $replaceFind[3] = $configuration['site_title'];

   //          $email = $configuration['admin_email'];
   //     }

       if($template_code == 'reset_password')
       {
            $patternFind[0] = '/{NAME}/';
            $patternFind[1] = '/{SUBJECT}/';
            $patternFind[2] = '/{MESSAGE}/';
            $patternFind[3] = '/{SITENAME}/';
            
            $replaceFind[0] = $data['name'];
            $replaceFind[1] = $data['subject'];
            $replaceFind[2] = $data['message'];
            $replaceFind[3] = $configuration['site_title'];
       }

       

        $subject = $template->subject;
        $txtdesc    = stripslashes($template->description);
        $ebody      = nl2br(preg_replace($patternFind, $replaceFind, $txtdesc));
        $body = html_entity_decode(stripslashes($ebody));  
      
       \Config::set(['port' => $configuration['smtp_port_number'],'host' => $configuration['smtp_server_host'],'username' => $configuration['smtp_uName'],'password' => $configuration['smtp_uPass']]);

       $message = $subject;
       $sender = ['subject' => $subject,'email' => $email,'name' => $data['name'],'attachment'=>$attachment,'from' => ['address' => $configuration['smtp_uName'],'name' => $configuration['site_title']]];

       if(!empty($body) && !empty($email)){
           Mail::send(array('html' => 'email.mail'), ['body' => $body], function($message) use ($sender){
               $message->to(
                   $sender['email'], 
                   $sender['name']
               )
               ->subject($sender['subject'])
               ->from(
                   $sender['from']['address'],
                   $sender['from']['name']
               );
           });
       }
   }
}



// memberbearer send email
/** mail sender **/
function send_memberbearer_email($email,$fullname,$template_code,$data,$attachment='') {

   $template = \DB::table('email_template')->select(['subject','description'])->where('title',$template_code)->first();
   // dd($template);
   if(!empty($template_code)){

       $configuration = ___configuration(['smtp_server_host','smtp_port_number','smtp_uName','smtp_uPass','site_title','admin_email']);
       // dd($template_code);
       // dd($configuration);
       // $subject    = $template->subject;           
       $body       = $template->description;
       // dd($body);
   //     if($template_code == 'subscribe')
   //     {
   //          $patternFind[0] = '/{SITENAME}/';
            
   //          $replaceFind[0] = $configuration['site_title'];
   //     }
       
      //  if($template_code == 'contact_us')
   //     {
   //          $patternFind[0] = '/{NAME}/';
   //          $patternFind[1] = '/{SITENAME}/';
            
   //          $replaceFind[0] = $data['name'];
   //          $replaceFind[1] = $configuration['site_title'];
   //     }
      
      // if($template_code == 'contact_us_admin')
   //     {
   //          $patternFind[0] = '/{NAME}/';
   //          $patternFind[1] = '/{FROM_EMAIL}/';
   //          $patternFind[2] = '/{MESSAGE}/';
   //          $patternFind[3] = '/{SITENAME}/';
            
   //          $replaceFind[0] = $data['name'];
   //          $replaceFind[1] = $data['email'];
   //          $replaceFind[2] = $data['enquiry'];
   //          $replaceFind[3] = $configuration['site_title'];

   //          $email = $configuration['admin_email'];
   //     }

       if($template_code == 'memeberbearer_sendmsg')
       {
            $patternFind[0] = '/{NAME}/';
            $patternFind[1] = '/{EMAIL}/';
            $patternFind[2] = '/{MESSAGE}/';
            // $patternFind[3] = '/{SITENAME}/';
            
            $replaceFind[0] = $data['name'];
            $replaceFind[1] = $data['email'];
            $replaceFind[2] = $data['message'];
            // $replaceFind[3] = $configuration['site_title'];
       }

       

        // $subject = $template->subject;
        $txtdesc    = stripslashes($template->description);
        $ebody      = nl2br(preg_replace($patternFind, $replaceFind, $txtdesc));
        $body = html_entity_decode(stripslashes($ebody));  
      
       \Config::set(['port' => $configuration['smtp_port_number'],'host' => $configuration['smtp_server_host'],'username' => $configuration['smtp_uName'],'password' => $configuration['smtp_uPass']]);

       $message = $body;
       $sender = ['email' => $data['hidemail'],'name' => $data['name'],'attachment'=>$attachment,'from' => ['address' => $configuration['smtp_uName'],'name' => $configuration['site_title']]];

       if(!empty($body) && !empty($email)){
           Mail::send(array('html' => 'email.mail'), ['body' => $body], function($message) use ($sender){
               $message->to(
                   $sender['email'], 
                   $sender['name']
               )
               // ->subject($sender['subject'])
               ->from(
                   $sender['from']['address'],
                   $sender['from']['name']
               );
           });
       }
   }
}
?>