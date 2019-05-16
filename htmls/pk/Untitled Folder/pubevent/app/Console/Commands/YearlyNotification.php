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

        $general = new General();
        
        if(env('DEVELOPMENT_MODE')){
            
            $recipient_to[0] = 'raveena@singsys.com';
            $recipient_cc[0] = 'hitesh@singsys.com';

        } else {
 
            $recipient_to = $general->getRecipient(1);
            $recipient_cc = $general->getRecipient(2);
        }
        
        $data = $general->getTemplate('year');

        $general->sendEmail($data['subject'], $data['body'], $recipient_to, $recipient_cc);

        $this->info('Send notification');
    }
}