<?php

namespace App\Jobs;

use App\Models\ApplicationEvent;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;

class EventWinnerAnnouncement implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $event;
    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(Object $event)
    {
        $this->event = $event;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {   
        /**
         * get all  registered users of the event
         */
        $user_ids = ApplicationEvent::where([
            'event_id'              => $this->event,
            'status'                => 'confirm',
            'register_as_lucky_draw'=> 'Yes'
        ])
        ->pluck('user_id')
        ->toArray();

        /***
         * send notification to the winner of the event
         */
        SendPushNotificationJob::dispatch([$this->event->user_id],[],'event','Winner has been announced.','You are the winner of the event '.$this->event->event->title);
        /**
         * send notification to all user's of the event 
         */
        SendPushNotificationJob::dispatch($user_ids,[],'event','Winner has been announced.',$this->event->winner->name.' is the winner of the event '.$this->event->event->title);
    }
}
