<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNewsLetterMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $advertisements;
    public $newsletters;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($advertisements,$newsletters)
    {
        $this->advertisements=$advertisements;
        $this->newsletters=$newsletters;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.sendNewsletter');
    }
}
