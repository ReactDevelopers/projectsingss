<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Lib\General;
use DB;

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
            $template = $general->getTemplate('year');
            $template = $template['body'];
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

    /**
     * Getting the recipient list
     * @param  Request [type] 1 for to, 2 for cc
     * @return Json
     */
    public function recipientList(Request $request){
        // $users = \App\User::select('users.id','users.name', 'email', DB::raw('IF(recipient = 1, "To", IF(recipient=2, "CC", "N/A")) as recipient'));

        $users = \App\User::select('users.id','users.name', 'email', DB::raw('IF(recipient = 1, "To", IF(recipient=2, "CC", "N/A")) as recipient'), DB::raw('IF(name="Peng Kah Poh", "b", IF(name="Lim Choon Khiang","c", IF(name="Abdul Khalik Abd Latiff" ,"d" ,"f"))) as template_order'))->whereNotNull('email');

        if($request->has('searchdata') && $request->searchdata){
            $users->where(function($q) use($request){
                $q->orWhere('users.email','LIKE',"%{$request->searchdata}%");
                $q->orWhere('users.name','LIKE',"%{$request->searchdata}%");
            });
        }

        // $groups = \App\Models\EmailGroup::select('id','title as name','email',DB::raw('IF(recipient = 1, "To", IF(recipient=2, "CC", "N/A")) as recipient'));

        $groups= \App\Models\EmailGroup::select('id','title as name','email',DB::raw('IF(recipient = 1, "To", IF(recipient=2, "CC", "N/A")) as recipient'), DB::raw('IF(title="PUB-SMM", "a", "f" ) template_order'))->whereNotNull('email');

        if($request->has('searchdata') && $request->searchdata){
            $groups->where(function($q) use($request){
                $q->orWhere('email','LIKE',"%{$request->searchdata}%");
                $q->orWhere('title','LIKE',"%{$request->searchdata}%");
            });
        }

        $sub_query = $users->union($groups)->orderBy('template_order','ASC');

        $all_users = DB::table( DB::raw("({$sub_query->toSql()}) as sub") )->select('id','name','email')->mergeBindings($sub_query->getQuery())->get();

        //$all_users = $users->union($groups)->limit('15')->offset('0')->get();

        $this->data['data'] = $all_users;
        return $this->response();  
    }

}
