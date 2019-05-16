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
        /** Send Group Notification **/
        $sub_query =  \App\Models\Event::select('id','group_id','start_date')->whereRaw('group_id > 0')->orderBy('start_date','ASC');

        $events = DB::table( DB::raw("({$sub_query->toSql()}) as sub") )->select('*')
            ->mergeBindings($sub_query->getQuery())->whereRaw('start_date = DATE_ADD(CURDATE(), INTERVAL 15 DAY)')->groupBy('group_id')->get()->toArray();

        if($events):

            $to = \App\User::select(DB::raw('GROUP_CONCAT(email) as recipient_to'))->where('recipient',1)->first();
            $cc = \App\User::select(DB::raw('GROUP_CONCAT(email) as recipient_cc'))->where('recipient',2)->first();

            // $recipient_to = $to ? explode(',', $to->recipient_to) : '';
            // $recipient_cc = $cc ? explode(',', $cc->recipient_cc) : '';

            $recipient_to[0] = 'raveena@singsys.com';
            $recipient_cc[0] = 'chetandeep@singsys.com';

            foreach ($events as $key => $value) {
                $general = new General();
                $data = $general->getTemplate('group', $value->group_id);

                $general->sendEmail($data['subject'], $data['body'], $recipient_to, $recipient_cc);
            }

        endif;

        /** Send Individual Notification **/
        $events = \App\Models\Event::select('*')->whereRaw('start_date = DATE_ADD(CURDATE(), INTERVAL 15 DAY)')->get()->toArray();

        if($events):

            $to = \App\User::select(DB::raw('GROUP_CONCAT(email) as recipient_to'))->where('recipient',1)->first();
            $cc = \App\User::select(DB::raw('GROUP_CONCAT(email) as recipient_cc'))->where('recipient',2)->first();

            // $recipient_to = $to ? explode(',', $to->recipient_to) : '';
            // $recipient_cc = $cc ? explode(',', $cc->recipient_cc) : '';

            $recipient_to[0] = 'raveena@singsys.com';
            $recipient_cc[0] = 'chetandeep@singsys.com';

            foreach ($events as $key => $value) {
                $general = new General();
                $data = $general->getTemplate('individual', $value['id']);

                $general->sendEmail($data['subject'], $data['body'], $recipient_to, $recipient_cc);
            }

        endif;

        $this->info('Send notification');
    }
}