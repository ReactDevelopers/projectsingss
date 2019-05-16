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
	public function getTemplate($type, $id=NULL){

		// $to_emails = \App\User::select('users.id','users.name', 'email')->where('recipient',1)->get()->toArray();
  //       $cc_emails = \App\User::select('users.id','users.name', 'email')->where('recipient',2)->get()->toArray();

  //       $to_grp_emails = \App\Models\EmailGroup::select('id','title as name', 'email')->where('recipient',1)->get()->toArray();
  //       $cc_grp_emails = \App\Models\EmailGroup::select('id','title as name', 'email')->where('recipient',2)->get()->toArray();

        $to_users = \App\User::select('users.id','users.name', 'email', DB::raw('IF(recipient = 1, "To", IF(recipient=2, "CC", "N/A")) as recipient'), DB::raw('IF(name="Peng Kah Poh", "b", IF(name="Lim Choon Khiang","c", IF(name="Abdul Khalik Abd Latiff" ,"d" ,"f"))) as template_order'))->whereNotNull('email')->where('recipient',1);

        $to_groups= \App\Models\EmailGroup::select('id','title as name','email',DB::raw('IF(recipient = 1, "To", IF(recipient=2, "CC", "N/A")) as recipient'), DB::raw('IF(title="PUB-SMM", "a", "f" ) template_order'))->whereNotNull('email')->where('recipient',1);

        $sub_query = $to_users->union($to_groups)->orderBy('template_order','ASC');

        $to_emails = DB::table( DB::raw("({$sub_query->toSql()}) as sub") )->select('id','name','email')->mergeBindings($sub_query->getQuery())->get();


        $cc_users = \App\User::select('users.id','users.name', 'email', DB::raw('IF(recipient = 1, "To", IF(recipient=2, "CC", "N/A")) as recipient'), DB::raw('IF(name="Peng Kah Poh", "b", IF(name="Lim Choon Khiang","c", IF(name="Abdul Khalik Abd Latiff" ,"d" ,"f"))) as template_order'))->whereNotNull('email')->where('recipient',2);

        $cc_groups= \App\Models\EmailGroup::select('id','title as name','email',DB::raw('IF(recipient = 1, "To", IF(recipient=2, "CC", "N/A")) as recipient'), DB::raw('IF(title="PUB-SMM", "a", "f" ) template_order'))->whereNotNull('email')->where('recipient',2);

        $sub_query = $to_users->union($to_groups)->orderBy('template_order','ASC');

        $cc_emails = DB::table( DB::raw("({$sub_query->toSql()}) as sub") )->select('id','name','email')->mergeBindings($sub_query->getQuery())->get();



        $data['to'] = $to_emails;
        $data['cc'] = $cc_emails;

        $event_name = '';

        if($type == 'individual'){
            $event = \App\Models\Event::select('*',DB::raw('IF(
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
                        ) as date'), DB::raw('IF(
                            start_date = end_date,
                            DATE_FORMAT(start_date, "%b %Y"),
                            IF(
                                MONTH(start_date) = MONTH(end_date),
                                CONCAT(
                                    DATE_FORMAT(start_date, "%d"),
                                    "-",
                                    DATE_FORMAT(end_date, "%b %Y")
                                ),
                                CONCAT(
                                    DATE_FORMAT(start_date, "%b %Y"),
                                    "-",
                                    DATE_FORMAT(end_date, "%b %Y")
                                )
                            )
                        ) as month'))->find($id);

            $event_name = $event->title . ' - ' . $event->date;

            // 1- individual
            $email_template = \App\Models\EmailTemplate::select('body','subject')->where('type','1')->first();

            $bodyPatternFind[0] = '/{YEAR}/';
            $bodyPatternFind[1] = '/{INDIVIDUAL_EVENT}/';
            $bodyPatternFind[2] = '/{EVENT_LIST}/';
            $bodyPatternFind[3] = '/{UPCOMING_EVENT_MONTH}/';
            $bodyPatternFind[4] = '/{UPCOMING_EVENT_DATE}/';

            $individual_event = "<table style='margin-left: 30px; border: 1px solid #000; border-collapse: collapse; text-align: left; color: rgb(0,112,192); font-size: 13px;'>
                    <thead>
                        <tr style='background: rgb(174,170,170); font-style: italic;'>
                            <th style='padding: 0 5px;border: 1px solid black; border-collapse: collapse;'>S/N</th>
                            <th style='padding: 0 5px; border: 1px solid black;border-collapse: collapse;'>Event</th> 
                            <th style='padding: 0 5px; border: 1px solid black;border-collapse: collapse;'>Venue</th>
                            <th style='padding: 0 5px; border: 1px solid black;border-collapse: collapse;'>Security Level</th>
                            <th style='padding: 0 5px; border: 1px solid black;border-collapse: collapse;'>Date</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr style='font-style: italic;'>
                                <td style='padding: 0 5px; border: 1px solid black;border-collapse: collapse;'>1</td>
                                <td style='padding: 0 5px; border: 1px solid black;border-collapse: collapse;'>".$event->title."</td> 
                                <td style='padding: 0 5px; border: 1px solid black;border-collapse: collapse;'>".$event->venue."</td>
                                <td style='padding: 0 5px; border: 1px solid black;border-collapse: collapse;'>".$event->security_level."</td>
                                <td style='padding: 0 5px; border: 1px solid black;border-collapse: collapse;'>".$event->date."</td>
                        </tr>
                    </tbody>
                    </table>
                    </div>";

            $bodyReplaceFind[0] = date('Y');
            $bodyReplaceFind[1] = $individual_event;
            $bodyReplaceFind[2] = self::eventListing('individual', $id = array($id));
	        $bodyReplaceFind[3] = $event->month;
            $bodyReplaceFind[4] = $event->date;
        }

        if($type == 'group'){
            $events = \App\Models\Event::select('*',DB::raw('IF(
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
                        ) as date'),
                        DB::raw('IF(
                            start_date = end_date,
                            DATE_FORMAT(start_date, "%b %Y"),
                            IF(
                                MONTH(start_date) = MONTH(end_date),
                                CONCAT(
                                    DATE_FORMAT(start_date, "%d"),
                                    "-",
                                    DATE_FORMAT(end_date, "%b %Y")
                                ),
                                CONCAT(
                                    DATE_FORMAT(start_date, "%b %Y"),
                                    "-",
                                    DATE_FORMAT(end_date, "%b %Y")
                                )
                            )
                        ) as month'),DB::raw('DATE_FORMAT(start_date, "%d %b %Y") as start_date_formatted'), DB::raw('DATE_FORMAT(end_date, "%d %b %Y") as end_date_formatted'))->where('group_id',$id)->orderBy('start_date','ASC')->get()->toArray();

            // 2- grouping
            $email_template = \App\Models\EmailTemplate::select('body','subject')->where('type','2')->first();

            $bodyPatternFind[0] = '/{YEAR}/';
            $bodyPatternFind[1] = '/{GROUP_EVENT}/';
            $bodyPatternFind[2] = '/{EVENT_LIST}/';
            $bodyPatternFind[3] = '/{UPCOMING_EVENT_MONTH}/';
            $bodyPatternFind[4] = '/{UPCOMING_EVENT_DATE}/';

            $group_event = "<table style='margin-left: 30px; border: 1px solid #000; border-collapse: collapse; text-align: left; color: rgb(0,112,192); font-size: 13px;'>
                    <thead>
                        <tr style='background: rgb(174,170,170); font-style: italic;'>
                            <th style='padding: 0 5px;border: 1px solid black; border-collapse: collapse;'>S/N</th>
                            <th style='padding: 0 5px; border: 1px solid black;border-collapse: collapse;'>Event</th> 
                            <th style='padding: 0 5px; border: 1px solid black;border-collapse: collapse;'>Venue</th>
                            <th style='padding: 0 5px; border: 1px solid black;border-collapse: collapse;'>Security Level</th>
                            <th style='padding: 0 5px; border: 1px solid black;border-collapse: collapse;'>Date</th>
                        </tr>
                    </thead>
                    <tbody>";

            $id = array();

            $event_month = $event_date = '';
            $count = 0;
            foreach ($events as $key):
                    if($count == 0):
                        $event_month = $key['month'];
                        $event_date = $key['date'];
                        //\Log::info($event_date);
                        $event_name = $key['start_date_formatted'];
                    endif;

                    if($count === (count($events)-1)):
                        $event_name .= ' - ' . $key['start_date_formatted'];
                    endif;
                    $group_event .= "<tr style='font-style: italic;'>
                                        <td style='padding: 0 5px; border: 1px solid black;border-collapse: collapse;'>".++$count."</td>
                                        <td style='padding: 0 5px; border: 1px solid black;border-collapse: collapse;'>".$key['title']."</td> 
                                        <td style='padding: 0 5px; border: 1px solid black;border-collapse: collapse;'>".$key['venue']."</td>
                                        <td style='padding: 0 5px; border: 1px solid black;border-collapse: collapse;'>".$key['security_level']."</td>
                                        <td style='padding: 0 5px; border: 1px solid black;border-collapse: collapse;'>".$key['date']."</td>
                                </tr>";

                    $id[] = $key['id'];
            endforeach;

            $group_event .= "</tbody>
                    </table>
                    </div>";

            $bodyReplaceFind[0] = date('Y');
            $bodyReplaceFind[1] = $group_event;
            $bodyReplaceFind[2] = self::eventListing('group', $id);
            $bodyReplaceFind[3] = $event_month;
            $bodyReplaceFind[4] = $event_date;
        }

        if($type == 'year'){
            $email_template = \App\Models\EmailTemplate::select('body','subject')->where('type','3')->first();

            $bodyPatternFind[0] = '/{YEAR}/';
            $bodyPatternFind[1] = '/{EVENT_LIST}/';

            $bodyReplaceFind[0] = date('Y');
            $bodyReplaceFind[1] = self::eventListing('year');
        }

        $data['subject'] = str_replace('{YEAR}', date('Y'), $email_template->subject);

        if($event_name)
            $data['subject'] = $data['subject'].' - '.$event_name;

        $data['body'] = preg_replace($bodyPatternFind, $bodyReplaceFind, $email_template->body); 

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

        try {
            $mail = Mail::send('emails.default',  ['body' => $body], function($message) use($sender,$body) {
                       $message->to(
                           $sender['to']
                       )
                       ->cc($sender['cc'])
                       ->subject($sender['subject'])
                       ->from(
                           $sender['from']['address'],
                           $sender['from']['name']
                       )
                       ->replyTo(env('REPLY_TO','PUB-JO-WSU-EP@pub.gov.sg'));
                       //->setBody($body,'text/html');
            });

            \App\Models\EmailLog::create(['subject' => $subject, 'recipient_to' => json_encode($to), 'recipient_cc' => json_encode($cc) ,'status' => 'success']);
        } catch (\Exception $ex) {
            \App\Models\EmailLog::create(['subject' => $subject, 'recipient_to' => json_encode($to), 'recipient_cc' => json_encode($cc) ,'status' => 'failure']);

            \Log::info($ex->getMessage());
        }

        return true;
	}

	/**
     * This function is used to get the event listing
     * @return template
    */ 
	public function eventListing($type, $id=NULL){

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

		$template = "         
                <table style='margin-left: 30px; border: 1px solid #000; border-collapse: collapse; text-align: left; color: rgb(0,112,192); font-size: 13px;'>
                    <thead>
                        <tr style='background: rgb(174,170,170); font-style: italic;'>
                            <th style='padding: 0 5px;border: 1px solid black; border-collapse: collapse;'>S/N</th>
                            <th style='padding: 0 5px; border: 1px solid black;border-collapse: collapse;'>Event</th> 
                            <th style='padding: 0 5px; border: 1px solid black;border-collapse: collapse;'>Venue</th>
                            <th style='padding: 0 5px; border: 1px solid black;border-collapse: collapse;'>Security Level</th>
                            <th style='padding: 0 5px; border: 1px solid black;border-collapse: collapse;'>Date</th>
                        </tr>
                    </thead>
                    <tbody>";

        $count = 0;
        foreach ((array) $events as $key => $value) {

            $color = '';
            if($value['type'] == 'past')
                $color = "color:rgb(174,170,170)";
            if($type != 'year' && in_array($value['id'], $id))
                $color = "background-color:yellow";

            $template .= "<tr style='font-style: italic; ".$color."'>
                            <td style='padding: 0 5px; border: 1px solid black;border-collapse: collapse;'>".++$count."</td>
                            <td style='padding: 0 5px; border: 1px solid black;border-collapse: collapse;'>".$value['title']."</td> 
                            <td style='padding: 0 5px; border: 1px solid black;border-collapse: collapse;'>".$value['venue']."</td>
                            <td style='padding: 0 5px; border: 1px solid black;border-collapse: collapse;'>".$value['security_level']."</td>
                            <td style='padding: 0 5px; border: 1px solid black;border-collapse: collapse;'>".$value['date']."</td>
                          </tr>";
        }

        $template .=  '</tbody>
                    </table>
                    </div>';

        return $template;
	}

    /**
     * This function is used to fetch the to and cc recipient
     * @param  Request $request [type=1/2] 1 for to, 2 for cc
     * @return array 
     */ 
    public function getRecipient($type){

        if($type == '1'):
                $to = \App\User::select('email', DB::raw('IF(name="Peng Kah Poh", "b", IF(name="Lim Choon Khiang","c", IF(name="Abdul Khalik Abd Latiff" ,"d" ,"f"))) as template_order'))->where('recipient',1)->whereNotNull('email');
                $group_to= \App\Models\EmailGroup::select('email', DB::raw('IF(title="PUB-SMM", "a", "a" ) template_order'))->where('recipient',1)->whereNotNull('email');

                $sub_query = $to->union($group_to)->orderBy('template_order','ASC');

                $to_emails = DB::table( DB::raw("({$sub_query->toSql()}) as sub") )->select('email')->mergeBindings($sub_query->getQuery())->get()->toArray();

                return $to_emails;
        endif;

        if($type == '2'):
                $cc = \App\User::select('email', DB::raw('IF(name="Peng Kah Poh", "b", IF(name="Lim Choon Khiang","c", IF(name="Abdul Khalik Abd Latiff" ,"d" ,"f"))) as template_order'))->where('recipient',2)->whereNotNull('email');
                $group_cc= \App\Models\EmailGroup::select('email', DB::raw('IF(title="PUB-SMM", "f", "a" ) template_order'))->where('recipient',2)->whereNotNull('email');

                $sub_query = $cc->union($group_cc)->orderBy('template_order','ASC');

                $cc_emails = DB::table( DB::raw("({$sub_query->toSql()}) as sub") )->select('email')->mergeBindings($sub_query->getQuery())->get()->toArray();

                return $cc_emails;
        endif;
    }
}