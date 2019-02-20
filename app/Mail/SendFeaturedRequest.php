<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class SendFeaturedRequest extends Mailable
{
    use Queueable, SerializesModels;
    public $name;
    public $email;
    public $tel;
    public $ad_id;
    public $ad_title;
    public $image;

    /**
     * Create a new message instance.
     *
     * @param $user
     * @param $advertisement
     */
    public function __construct($user,$advertisement)
    {
        $this->name=$user['name'];
        $this->email=$user['email'];
        $this->tel=$user['tel_no'];
        $this->ad_id=$advertisement['id'];
        $this->ad_title=$advertisement['title'];
        $this->image=$advertisement['img_1'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.featured');
    }
}

