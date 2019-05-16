<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Events\RosterCreatedEvent;
use App\Jobs\SendPushNotificationJob;

class SendCreateRosterNotification
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
    public function handle(RosterCreatedEvent $event)
    {
        //
        SendPushNotificationJob::dispatch(
            [$event->work_schedule->user_id],
            ['section' => 'Roster'],
            'roster',
            'Roster has been Created Successfully.',
            'Roster has been Created Successfully.'
        );
    }
}
