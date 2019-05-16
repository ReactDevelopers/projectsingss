<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;
use DB;
use FCM;

class SendPushNotificationJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */

    public $user_ids = [];
    public $title = null;
    public $body = null;
    public $data = [];
    public $type  = null;

    public function __construct(array $user_ids, array $data, $type, $title= null, $body = null)
    {

        $this->user_ids = $user_ids;
        $this->title = $title;
        $this->body = $body;
        $this->type = $type;
        $this->data = $data;
    }


    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $site_config = app()->make('site_config');

        app('config')->set('fcm', [

            'driver' => env('FCM_PROTOCOL', 'http'),
            'log_enabled' => false,

            'http' => [
                'server_key' => $site_config->get('FIREBASE_SERVER_KEY', env('FCM_SERVER_KEY') ),
                'sender_id' => $site_config->get('FIREBASE_SENDER_ID', env('FCM_SENDER_ID') ),
                'server_send_url' => 'https://fcm.googleapis.com/fcm/send',
                'server_group_url' => 'https://android.googleapis.com/gcm/notification',
                'timeout' => 30.0, // in second
            ]
        ]);

        $tokens = \App\Lib\SgApp::getUserDeviceToken($this->user_ids);

        if($this->type == 'event') {

            $tokens->where('device_user.settings->enable_event_push_notification', 'Yes');
        }
        else if($this->type == 'roster') {

            $tokens->where('device_user.settings->enable_roster_push_notification', 'Yes');
        }
        else if($this->type == 'certificate_expire') {

            $tokens->where('device_user.settings->enable_certificate_expire_push_notification', 'Yes');
        }

        $tokens = $tokens->get()->pluck('device_token')->toArray();

        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);

        $notificationBuilder = new PayloadNotificationBuilder($this->title);
        $notificationBuilder->setBody($this->body)
                            ->setSound('default');
        $this->data['section'] = $this->type;
        $this->data['title'] = $this->title;
        $this->data['body'] = $this->body;
        $dataBuilder = new PayloadDataBuilder();
        $dataBuilder->addData($this->data);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();
        try {
            $downstreamResponse = FCM::sendTo($tokens, $option, $notification, $data);
        }catch(\Exception $e) {

        }

        // $downstreamResponse->numberSuccess();
        // $downstreamResponse->numberFailure();
        // $downstreamResponse->numberModification();

        // //return Array - you must remove all this tokens in your database
        // $downstreamResponse->tokensToDelete();

        // //return Array (key : oldToken, value : new token - you must change the token in your database )
        // $downstreamResponse->tokensToModify();

        // //return Array - you should try to resend the message to the tokens in the array
        // $downstreamResponse->tokensToRetry();
    }
}
