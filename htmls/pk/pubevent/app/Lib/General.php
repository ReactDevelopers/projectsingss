<?php

namespace App\Lib;
use DB;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Mail;

class General 
{
	/**
	 * Getting the role permission by role primary Id.
	 * @param number -> role_id
	 * @return Array
	 */
	static public function getRolePermissions($role_id) {

		if(!$role_id){

			return [];
		}
		
		return  Cache::rememberForever('role_access.'.$role_id, function() use($role_id) {			    
			
			$role = \App\Models\Role::find($role_id);
			return $role->permissions()->get()->pluck('name')->toArray();
		});
	}

	 /**
     * This function is used to get the template
     * @param  Request $request [description]
     * @param  [type]  individual, group [description]
     * @return [id] type=individual then event id else group id[description]
     */ 
	public function getTemplate($type, $id){

		$data['to'] = \App\User::select('users.id','users.name', 'email')->where('recipient',1)->get()->toArray();
        $data['cc'] = \App\User::select('users.id','users.name', 'email')->where('recipient',2)->get()->toArray();

        $bodyPatternFind[0] = '/{YEAR}/';
        $bodyPatternFind[1] = '/{EVENT_NAME}/';
        $bodyPatternFind[2] = '/{EVENT_DATE}/';
        $bodyPatternFind[3] = '/{EVENT_VENUE}/';

        if($type == 'individual'){
            $event = \App\Models\Event::find($id);

            // 1- individual
            $email_template = \App\Models\EmailTemplate::select('body','subject')->where('type','1')->first();

            $bodyReplaceFind[0] = date('Y');
	        $bodyReplaceFind[1] = $event->title;
	        $bodyReplaceFind[2] = $event->start_date;
	        $bodyReplaceFind[3] = $event->venue;
	        
        }

        if($type == 'group'){
            $group_event = \App\Models\Event::select(DB::raw('GROUP_CONCAT(title) as title'), DB::raw('GROUP_CONCAT(venue) as venue'),'start_date')->where('group_id',$id)->orderBy('start_date','ASC')->first();

            // 2- grouping
            $email_template = \App\Models\EmailTemplate::select('body','subject')->where('type','2')->first();

            $bodyReplaceFind[0] = date('Y');
	        $bodyReplaceFind[1] = $group_event->title;
	        $bodyReplaceFind[2] = $group_event->start_date;
	        $bodyReplaceFind[3] = $group_event->venue;
        }

        $data['subject'] = str_replace('{YEAR}', date('Y'), $email_template->subject);

        $body    = stripslashes($email_template->body);
        $data['body'] = nl2br(preg_replace($bodyPatternFind, $bodyReplaceFind, $body)); 

        $patternFind[4] = '/{EVENT_LIST}/';
        $replaceFind[4] = self::eventListing();

        $data['body'] = preg_replace($patternFind, $replaceFind, $data['body']); 

        return $data;
	}

	/**
     * This function is used to send the notification
     * @param  Request $request [description]
     * @return Json 
     */ 
	public function sendEmail($subject, $body, $to, $cc){

		$sender = [
                    'subject' => $subject,
                    'cc' => $cc,
                    'to' => $to,
                    'email' => env('DEVELOPMENT_MODE') ? env('TESTER_EMAIL') : $to,
                    'name' => '',
                    'from' => ['address' => env('MAIL_USERNAME'),'name' => env('MAIL_FROM_NAME')]
                ];

        $mail = Mail::send([],  [], function($message) use($sender,$body) {
                   $message->to(
                       $sender['to']
                   )
                   ->cc($sender['cc'])
                   ->subject($sender['subject'])
                   ->from(
                       $sender['from']['address'],
                       $sender['from']['name']
                   )
                   ->setBody($body,'text/html');
        });

        return true;
	}

	/**
     * This function is used to get the event listing
     * @return template
    */ 
	public function eventListing(){

		// get complete listing of the events and grey out past events and highlight current date event
        $events = \App\Models\Event::select('id','title','description','start_date','end_date','security_level','venue', 
        				DB::raw('IF(start_date <= CURDATE() && end_date >= CURDATE(), "ongoing", IF(start_date > CURDATE(), "upcoming", "past" ) ) as type'), 
        				DB::raw('IF(
					        start_date = end_date,
					        DATE_FORMAT(start_date, "%d %b %Y"),
					        IF(
					            MONTH(start_date) = MONTH(end_date),
					            CONCAT(
					                DATE_FORMAT(start_date, "%d"),
					                "-",
					                DATE_FORMAT(end_date, "%d %b %Y")
					            ),
					            CONCAT(
					                DATE_FORMAT(start_date, "%d %b %Y"),
					                "-",
					                DATE_FORMAT(end_date, "%d %b %Y")
					            )
					        )
					    ) as date'))
        			->whereRaw("YEAR(start_date) = ".date('Y'))->orderBy('start_date','ASC')->get()->toArray();

		$template = '            
                <table border="1" cellspacing="0" cellpadding="0">
                    <thead>
                        <tr>
                        	<th>S/N</th>
                            <th>Event</th>
                            <th>Venue</th>
                            <th>Security Level</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tbody>';

        $count = 0;
        foreach ((array) $events as $key => $value) {

            $style = '';
            if($value['type'] == 'past')
                $style = "style='background-color:#ababab'";
            if($value['type'] == 'ongoing')
                $style = "style='background-color:#006eda'";

            $template .= '<tr '.$style.'">
            				<td>'.++$count.'</td>
	                        <td>'.$value['title'].'</td>
	                        <td>'.$value['venue'].'</td>
	                        <td>'.$value['security_level'].'</td>
	                        <td>'.$value['date'].'</td>
                    	</tr>';
        }

        $template .=  '</tbody>
                    </table>';

        return $template;
	}
}