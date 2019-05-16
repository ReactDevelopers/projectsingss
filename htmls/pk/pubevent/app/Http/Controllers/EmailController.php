<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Lib\General;

class EmailController extends Controller {
    
    /**
     * Getting the email template by id
     * @param  Request $request [type]
     * @return Json
     */
    public function get(Request $request,$type)
    {
        $this->data = \App\Models\EmailTemplate::select('body','subject','type')->where('type',$type)->first();

        $template = '';
        $general = new General();
        
        if($type == '1'){
            $event = \App\Models\Event::select('id')->first();

            if($event):
                $template = $general->getTemplate('individual', $event->id);
                $template = $template['body'];
            endif;
        }
        elseif ($type == '2'){
            $group_event = \App\Models\Event::select('group_id')->whereRaw('group_id > 0')->first();

            if($group_event):
                $template = $general->getTemplate('group', $group_event->group_id);
                $template = $template['body'];
            endif;
        }
        else{
            $email_template = \App\Models\EmailTemplate::select('body','subject')->where('type','3')->first();

            $bodyPatternFind[0] = '/{YEAR}/';
            $bodyReplaceFind[0] = date('Y');
            

            $data['subject'] = str_replace('{YEAR}', date('Y'), $email_template->subject);

            $body    = stripslashes($email_template->body);
            $data['body'] = nl2br(preg_replace($bodyPatternFind, $bodyReplaceFind, $body)); 

            $patternFind[4] = '/{EVENT_LIST}/';
            $replaceFind[4] = $general->eventListing();

            $template = preg_replace($patternFind, $replaceFind, $data['body']); 
        }

        $this->data->template = $template;
        return $this->response();
    }

    /**
     * Updating the email template.
     * @param  Request $request [type]
     * @return [Json] 
     */
    public function update(Request $request,$type)
    {
        $validator = \Validator::make($request->all(),[
            'body'=>'required',
            'subject' =>'required'
        ]);

        if($validator->fails()){

            $this->status = false;
            $this->message = 'Please enter the valid details.';
            $this->errors = $validator->errors();
            $this->code = 403;

        }else{

            $this->message = 'Email Template has been updated.';
            $data = $request->only(['body', 'subject']);
            \App\Models\EmailTemplate::where('type', $type)->update($data);
            $this->code = 200;
        }

        return $this->response($this->code);
    }

}
