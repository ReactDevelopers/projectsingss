<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Mail\WelcomeMail;

class Welcome extends Notification
{
    use Queueable;

    private $broadcastBy = ['email'];

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($broadcast_by)
    {
        $this->broadcastBy = $broadcast_by;
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
            'user' => $notifiable->toArray()
        ];

        return new WelcomeMail($data);
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
