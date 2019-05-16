<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Models\UserVerification;
use App\Mail\ForgetPasswordMail;
use App\Services\Sms;


class ForgetPassword extends Notification
{
    use Queueable;

    private $broadcastBy = ['email'];
    private $userVerification = null;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(UserVerification $user_verification, $broadcast_by)
    {
        $this->broadcastBy = $broadcast_by;
        $this->userVerification = $user_verification;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return $this->broadcastBy;
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toEmail($notifiable)
    {
        $data = [
            'user_verification' => $this->userVerification->toArray(),
            'user' => $notifiable->toArray(),
            'link' => env('CLIENT_BASE_URL').'reset-password?token='. $this->userVerification->token
        ];

        return new ForgetPasswordMail($data);
    }

    public function toSms($notifiable) {

        $data = [
            'user_verification' => $this->userVerification->toArray(),
            'user' => $notifiable->toArray(),
            
        ];

        return new Sms($notifiable->mobile_no, 'FORGET_PASSWORD_SMS', $data);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
