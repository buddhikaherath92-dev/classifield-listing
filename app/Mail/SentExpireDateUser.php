<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SentExpireDateUser extends Mailable
{
    use Queueable, SerializesModels;
    public $expire_Date;
    public $name;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($expire_Date,$name)
    {
        $this->expire_Date=$expire_Date;

       $this->name=$name;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Expired Advertisements on Aluth-Ads')->view('emails.sendEmail');
    }
}
