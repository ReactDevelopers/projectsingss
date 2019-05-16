<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Mail\RosterExportMail;

class RosterExportNotification extends Notification
{
    use Queueable;

    protected $excel;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($excel)
    {
        $this->excel = $excel;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['email'];
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
            'user'      => $notifiable->toArray(),
            'excel'     => $this->excel,
            'date'      => date('d-M-Y')
        ];
        return new RosterExportMail($data);
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
