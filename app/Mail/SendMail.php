<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Mail\Mailables\Content;
use Illuminate\Mail\Mailables\Envelope;
use Illuminate\Queue\SerializesModels;


class SendMail extends Mailable
{
    use Queueable, SerializesModels;
    // we are getting $details from MailController 
    public $details;
    /**
     * Create a new message instance.
     */
    public function __construct($details=[])
    {
        $this->details = $details;
    }

    /**
     * Get the message envelope.
     */
    public function build()
    {
        if($this->details['file']){
            return $this->subject('Mail from EnrichDD to Enoch')
            ->view('admin.email.sendmail')
            ->attach($this->details['file']->getRealPath(), [
                'as' => $this->details['file']->getClientOriginalName(),
                'mime' => $this->details['file']->getClientMimeType(),
            ]);
        } else {
            return $this->subject('Mail from EnrichDD to Enoch')
            ->view('admin.email.sendmail');
        }

    }
}
