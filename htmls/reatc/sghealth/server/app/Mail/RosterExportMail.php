<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Singsys\LQ\Lib\Concerns\NotificationTemplate;

class RosterExportMail extends Mailable
{
    use Queueable, SerializesModels,NotificationTemplate;

    protected $data;
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
        $data = $this->getTemaplate('ROSTER_EXCEL_EXPORT', $this->data);
       
        return  $this->html($data['body'])
                    ->subject($data['subject'])
                    ->attach($this->data['excel'], [
                        'as' => 'roster.xlsx',
                        'mime' => 'application/xlsx',
                    ]);
                    
    }
}
