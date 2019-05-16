<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;


use Illuminate\Support\Facades\Session;

/** clear session keys **/
function clear_session_key(){
  Session::forget('error');
  Session::forget('success');
}

/** upload files **/
function upload_file($request, $file_key_name = 'file', $folder = 'uploads/', $thumb='', $width = '', $height = '', $upload_file_name = '', $file_type = 'image') {
	  $destination = public_path().'/uploads/'.$folder;
    $file       = $request->file($file_key_name);
    $extension  = $file->getClientOriginalExtension();
    $file_name  = file_name($file->getClientOriginalName(),$extension);

    if($upload_file_name)
      $file_name = $upload_file_name;

    if($thumb)
    {
        $img = Image::make($request->file($file_key_name)->getRealPath());
        $img->resize(null, $width, function ($constraint) {
                    $constraint->aspectRatio();
        })->orientate()->save($destination.'thumb/'.$file_name);
    }
    else
    {
        if($file_type == 'image')
          Image::make($request->file($file_key_name)->getRealPath())->orientate()->save($destination.$file_name);
        else
          $file->move($destination,$file_name);
        
    }
    return $file_name;
}

/** upload logo **/
function upload_logo($request, $file_key_name = 'file', $folder = 'uploads/', $thumb='', $width = '', $height = '', $upload_file_name = '') {
    $destination = public_path().'/uploads/'.$folder;
    $file       = $request->file($file_key_name);
    $extension  = $file->getClientOriginalExtension();
    $file_name  = file_name($file->getClientOriginalName(),$extension);

    if($upload_file_name)
      $file_name = $upload_file_name;

    $save_path = $destination.$file_name;
    if($thumb)
    {
        $save_path = $destination.'thumb-'.$file_name;
    }

    $img = Image::make($request->file($file_key_name)->getRealPath());
    $img->fit($width,$height);

    $img->orientate()->save($save_path);
    
    return $file_name;
}

function _get_random_string($code_len = '8') {
    $chars = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ";
    $code = "";
    for ($i = 0; $i < $code_len; $i++) {
        $code .= $chars[mt_rand(0, strlen($chars) - 1)];
    }
    return $code;
}

/** upload files **/
function unlink_file($folder = '', $file_name = 'file') {
    \File::delete(public_path().'/uploads/'.$folder.'/'.$file_name);
}

function get_file_size($size,$conversion){
    if($conversion == 'KB'){
        return sprintf("%s KB",number_format(($size/1024),2));
    }

    return (string)$size;
}

function file_name($original_file_name,$original_extension){
        return sprintf("%s-%s.%s",str_replace(".","", strtoupper($original_extension)),time(),$original_extension);
}


function ___configuration($keys = []){
   $config_table = \App\Models\Settings::Select('*');
	
   if(!empty($keys)){
       $config_table->whereIn('key',$keys);
   }

   $configData = $config_table->get()->toArray();
  
   return \Shared\Dash::combine((array)$configData,'{n}.key','{n}.value');
}

/** mail sender **/
function send_email($email,$fullname,$template_code,$data,$attachment='') {
   $template = \DB::table('email_template')->select(['subject','description'])->where('title',$template_code)->first();

   if(!empty($template_code)){

       $configuration = ___configuration(['smtp_server_host','smtp_port_number','smtp_uName','smtp_uPass','store_name','site_title','admin_email']);
       $subject    = $template->subject;           
       $body       = $template->description;
       
       if($template_code == 'subscribe')
       {
            $patternFind[0] = '/{SITENAME}/';
            
            $replaceFind[0] = $configuration['site_title'];
       }
			 
			 if($template_code == 'contact_us')
       {
            $patternFind[0] = '/{NAME}/';
            $patternFind[1] = '/{SITENAME}/';
            
            $replaceFind[0] = $data['name'];
            $replaceFind[1] = $configuration['site_title'];
       }
			
			if($template_code == 'contact_us_admin')
       {
            $patternFind[0] = '/{NAME}/';
            $patternFind[1] = '/{FROM_EMAIL}/';
            $patternFind[2] = '/{MESSAGE}/';
            $patternFind[3] = '/{SITENAME}/';
            
            $replaceFind[0] = $data['name'];
            $replaceFind[1] = $data['email'];
            $replaceFind[2] = $data['enquiry'];
            $replaceFind[3] = $configuration['site_title'];

            $email = $configuration['admin_email'];
       }

       if($template_code == 'contact_us_reply')
       {
            $patternFind[0] = '/{NAME}/';
            $patternFind[1] = '/{MESSAGE}/';
            $patternFind[2] = '/{SITENAME}/';
            
            $replaceFind[0] = $data['name'];
            $replaceFind[1] = $data['reply'];
            $replaceFind[2] = $configuration['site_title'];
       }

       

        $subject = $template->subject;
        $txtdesc    = stripslashes($template->description);
        $ebody      = nl2br(preg_replace($patternFind, $replaceFind, $txtdesc));
        $body = html_entity_decode(stripslashes($ebody));  
			
       \Config::set(['port' => $configuration['smtp_port_number'],'host' => $configuration['smtp_server_host'],'username' => $configuration['smtp_uName'],'password' => $configuration['smtp_uPass']]);

       $message = $subject;
       $sender = ['subject' => $subject,'email' => $email,'name' => $data['name'],'attachment'=>$attachment,'from' => ['address' => $configuration['smtp_uName'],'name' => $configuration['site_title']]];

       if(!empty($body) && !empty($email)){
           Mail::send('emails.default', ['body' => $body], function($message) use ($sender){
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

/** Get Application Setings **/
function get_settings(){
  $settings = Settings::all();
  foreach ($settings as $key => $value) {
      $data['setting'][$value->key] = $value->value;
  }
  return (object)$data['setting'];
}



/***
 * Get Email Stem by ID
 * @param : Email Stem $id
 ***/
function get_email_stem($id)
{
    $data = \DB::table('email_stem')->select('email_stem')->where(['email_stem_id' => $id])->get()->first();
    return $data ? $data->email_stem : '';
}










function time_elapsed_string($ptime)
{
    $etime = time() - $ptime;

    if ($etime < 1)
    {
        return '0 seconds';
    }

    $a = array( 365 * 24 * 60 * 60  =>  'year',
                 30 * 24 * 60 * 60  =>  'month',
                      24 * 60 * 60  =>  'day',
                           60 * 60  =>  'hour',
                                60  =>  'minute',
                                 1  =>  'second'
                );
    $a_plural = array( 'year'   => 'years',
                       'month'  => 'months',
                       'day'    => 'days',
                       'hour'   => 'hours',
                       'minute' => 'minutes',
                       'second' => 'seconds'
                );

    foreach ($a as $secs => $str)
    {
        $d = $etime / $secs;
        if ($d >= 1)
        {
            $r = round($d);
            return $r . ' ' . ($r > 1 ? $a_plural[$str] : $str) . ' ago';
        }
    }
}


?>
