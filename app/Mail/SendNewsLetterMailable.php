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
    public $news_letter;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($advertisements,$news_letter)
    {
        $this->advertisements=$advertisements;
        $this->news_letter=$news_letter;
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
