<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class SendMaillable extends Mailable
{
    use Queueable, SerializesModels;
    public $pin;
    public $user;
    public $email;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pin)
    {
        $this->pin=$pin;
        $this->user= Auth::user()->name;
        $email=(request()->user()->email);
        $this->email=$email;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Verification Code on Aluth-Ads')->markdown('emails.verify');
    }
}
