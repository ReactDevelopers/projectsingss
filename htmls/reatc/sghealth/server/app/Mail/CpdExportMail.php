<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Singsys\LQ\Lib\Concerns\NotificationTemplate;

class CpdExportMail extends Mailable
{
    use Queueable, SerializesModels,NotificationTemplate;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
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
        $data = $this->getTemaplate('CPD_PDF_EXPORT', $this->data);

        return  $this->html($data['body'])
                    ->subject($data['subject'])
                    ->attachData($this->data['pdf'], 'cpd.pdf', [
                        'mime' => 'application/pdf',
                    ]);
    }
}
