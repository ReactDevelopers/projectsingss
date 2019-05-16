<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\RosterDeletedEvent;
use App\Jobs\SendPushNotificationJob;

class SendDeletedRosterNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(RosterDeletedEvent $event)
    {
        //
        SendPushNotificationJob::dispatch(
            [$event->work_schedule->user_id],
            ['section' => 'Roster'],
            'roster',
            'Roster has been Deleted',
            'Roster has been Deleted'
        );
    }
}
