<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Lib\General;
use DB;

class SendNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:Notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notification to the user before 15 days.';
    

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $email_threshold = \App\Models\Configuration::select('value')->where('key','email_threshold_tenure')->first();


        /** Send Group Notification **/
        $sub_query =  \App\Models\Event::select('id','group_id','start_date','allow_in_scheduled_email')->whereRaw('group_id > 0')
        ->where('allow_in_scheduled_email','Y')->orderBy('start_date','ASC');

        $events = DB::table( DB::raw("({$sub_query->toSql()}) as sub") )->select('*')
            ->mergeBindings($sub_query->getQuery())->whereRaw('start_date = DATE_ADD(CURDATE(), INTERVAL '.$email_threshold->value.' DAY)')
            ->groupBy('group_id')->get()->toArray();

        if($events):

            if(env('DEVELOPMENT_MODE')){
                $recipient_to[0] = 'sanjeet@singsys.com';
                $recipient_cc[0] = 'sanjeet@singsys.com';
            } else {
                $general = new General();
                $recipient_to = $general->getRecipient(1);
                $recipient_cc = $general->getRecipient(2);
            }

            foreach ($events as $key => $value) {
                $general = new General();
                $data = $general->getTemplate('group', $value->group_id);

                $general->sendEmail($data['subject'], $data['body'], $recipient_to, $recipient_cc);
            }

        endif;

        /** Send Individual Notification **/
        $events = \App\Models\Event::select('*')->whereRaw('start_date = DATE_ADD(CURDATE(), INTERVAL '.$email_threshold->value.' DAY)')
        ->where('allow_in_scheduled_email','Y')->get()->toArray();

        if($events):
        
            if(env('DEVELOPMENT_MODE')){
                $recipient_to[0] = 'sanjeet@singsys.com';
                $recipient_cc[0] = 'sanjeet@singsys.com';
            } else {
                $general = new General();
                $recipient_to = $general->getRecipient(1);
                $recipient_cc = $general->getRecipient(2);
            }

            foreach ($events as $key => $value) {
                $general = new General();
                $data = $general->getTemplate('individual', $value['id']);

                $general->sendEmail($data['subject'], $data['body'], $recipient_to, $recipient_cc);
            }

        endif;

        $this->info('Send notification');
    }
}