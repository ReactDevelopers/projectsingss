<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use App\Mail\ExportUserCertMail;


class SendUserCertEmail extends Notification
{
    use Queueable;


    private $exportExcel = null;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($exportExcel)
    {
        $this->exportExcel = $exportExcel;
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
            'user' => $notifiable->toArray(),
            'excel_path' => $this->exportExcel,
            'date'  => date('d-M-Y')
        ];
        return (new ExportUserCertMail($data));
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