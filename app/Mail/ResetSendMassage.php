<?php

namespace App\Mail;

use http\Client\Curl\User;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ResetSendMassage extends Mailable
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
    public function __construct($pin,$email)
    {
        $this->pin=$pin;
//        $email1=User::join('users', 'advertisements.user_id', 'users.id')->where('advertisements.id',request('id'))->get();

        $this->email=$email;
//        $this->user= Auth::user()->name;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.resetEmail');
    }
}
