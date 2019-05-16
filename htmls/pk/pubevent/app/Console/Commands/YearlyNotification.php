<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Lib\General;
use DB;

class YearlyNotification extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'yearly:Notification';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send notification once in a year.';
    

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        /** Send Yearly Notification **/

            $to = \App\User::select(DB::raw('GROUP_CONCAT(email) as recipient_to'))->where('recipient',1)->first();
            $cc = \App\User::select(DB::raw('GROUP_CONCAT(email) as recipient_cc'))->where('recipient',2)->first();

            // $recipient_to = $to ? explode(',', $to->recipient_to) : '';
            // $recipient_cc = $cc ? explode(',', $cc->recipient_cc) : '';

            $recipient_to[0] = 'raveena@singsys.com';
            $recipient_cc[0] = 'chetandeep@singsys.com';

            $general = new General();

            $email_template = \App\Models\EmailTemplate::select('body','subject')->where('type','3')->first();

            $bodyPatternFind[0] = '/{YEAR}/';
            $bodyReplaceFind[0] = date('Y');
            

            $data['subject'] = str_replace('{YEAR}', date('Y'), $email_template->subject);

            $body    = stripslashes($email_template->body);
            $data['body'] = nl2br(preg_replace($bodyPatternFind, $bodyReplaceFind, $body)); 

            $patternFind[4] = '/{EVENT_LIST}/';
            $replaceFind[4] = $general->eventListing();

            $data['body'] = preg_replace($patternFind, $replaceFind, $data['body']); 

            $general->sendEmail($data['subject'], $data['body'], $recipient_to, $recipient_cc);

        $this->info('Send notification');
    }
}