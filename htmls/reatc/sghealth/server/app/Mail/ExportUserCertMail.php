<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Singsys\LQ\Lib\Concerns\NotificationTemplate;

class ExportUserCertMail extends Mailable
{
    use Queueable, SerializesModels,NotificationTemplate;

    private $data = [];
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
        $data = $this->getTemaplate('USER_CERTIFICATE_EXPORT', $this->data);

        return  $this->html($data['body'])
                    ->subject($data['subject'])
                    ->attach(asset($this->data['excel_path']), [
                        'as' => 'certificate.xlsx',
                        'mime' => 'application/xlsx',
                    ]);
                    
    }
}
