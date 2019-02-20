<?php
/**
 * Created by PhpStorm.
 * User: oshadhi
 * Date: 2/14/19
 * Time: 11:55 AM
 */

namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendMessageMailable extends Mailable
{



    use Queueable, SerializesModels;
    public $pin;
    public $user_name;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($pin,$user_name)
    {
        $this->pin=$pin;
        $this->user_name=$user_name;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.sentMessage');
    }

}