<?php

namespace App\Lib;
use DB;
use Illuminate\Support\Facades\Mail;

class MailConfig 
{
    # In this varibale , we save template
    public $template;

    public function __construct($template_code,$data,$email)
    {
        //
        $this->template_code = $template_code;
        $this->data =  $data;  
        $this->email = $email;

        $this->sendMail($this->template_code, $this->data, $this->email);      
    }

    /**
    * This function send the mail to respective email address after running course signup
    * 
    */
    public function sendMail()
    {
        $this->template = \App\Models\EmailTemplate::where('type',$this->template_code)->select('body','subject')->get()->first();

        /* 
        * common template for group and individual 
        */
        if($this->template_code)
        {
            $subjectPatternFind[0] = '/{EVENT_NAME}/';
            
            $subjectReplaceFind[0] = $this->data['title'];

            $bodyPatternFind[0] = '/{EVENT}/';
            
            $bodyReplaceFind[0] = $this->data['template'];
        }  

        $subject = $this->template['subject'];
        $subject = nl2br(preg_replace($subjectPatternFind, $subjectReplaceFind, $subject)); 

        $body    = stripslashes($this->template['body']);
        $body      = nl2br(preg_replace($bodyPatternFind, $bodyReplaceFind, $body)); 
         
       $message = $subject;
       $cc = (isset($this->data['cc']) && $this->data['cc']) ? $this->data['cc'] : null;

       $sender = [
                'subject' => $subject,
                'email' => $this->email,
                'name' => $this->data['approver'],
                'cc'=> $cc,
                'from' => [
                    'address' => env('MAIL_USERNAME'),
                    'name' => env('MAIL_FROM_NAME')
                ]
            ];

       $emailLog = new \App\Lib\EmailLog( $sender['email'], $cc, $sender['subject'] );

       if(!empty($body) && !empty($this->email)){

            try{
               
               $mail = Mail::send([],[], function($message) use ($sender, $body){
                   $message->to(
                       env('DEVELOPMENT_MODE') ? env('TESTER_EMAIL') : $sender['email'], 
                       $sender['name']
                   )
                   ->subject($sender['subject'])
                   ->from(
                       $sender['from']['address'],
                       $sender['from']['name']
                   );

                   if(isset($sender['cc']) &&  $sender['cc'] ) {

                        $message->cc($sender['cc']);
                   }

                   $message->setBody($body,'text/html');

               });

            } catch(\Exception $e) {

            }
        }
    }
}