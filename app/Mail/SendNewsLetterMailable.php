<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendNewsLetterMailable extends Mailable
{
    use Queueable, SerializesModels;
    public $advertisement1;
    public $advertisement2;
    public $advertisement3;
    public $advertisement4;
    public $advertisement5;
    public $advertisement6;


    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($advertisements)
    {
        foreach ($advertisements as $advertisement){
            $this->advertisement1 = array(
                'advertisement_title' => $advertisement['title'],
                'advertisement_description' => $advertisement['description'],
                'advertisement_price' => $advertisement['price'],
                'advertisement_img' => $advertisement['img_1'],
            );
        }
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
