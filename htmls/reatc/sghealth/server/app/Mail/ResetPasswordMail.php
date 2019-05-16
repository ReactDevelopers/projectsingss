<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Singsys\LQ\Lib\Concerns\NotificationTemplate;


class ResetPasswordMail extends Mailable
{
    use Queueable, SerializesModels,NotificationTemplate;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Array $data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $data = $this->getTemaplate('RESET_PASSWORD_BY_ADMIN', $this->data);
        return  $this->html($data['body'])
                    ->subject($data['subject']);
    }
}
