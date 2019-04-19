<?php
/**
 * Created by IntelliJ IDEA.
 * User: sanju
 * Date: 4/18/19
 * Time: 12:02 PM
 */

namespace App\Mail;


use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class sendAdminMessage extends Mailable {
    use Queueable, SerializesModels;
    public $name;
    public $email;
    public $subject1;
    public $message;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($name)
    {
        $this->name=$name;
        $email=(request()->all()['email']);
        $this->email=$email;
        $subject1=(request()->all()['subject']);
        $this->subject1=$subject1;
        $message=(request()->all()['message']);
        $this->message=$message;

    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->subject('Contact-us Messages Aluth-Ads')->view('emails.adminContact');
    }
}