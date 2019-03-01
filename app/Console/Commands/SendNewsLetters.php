<?php

namespace App\Console\Commands;

use Illuminate\Support\Facades\Mail;
use App\Comments;
use App\Mail\SendNewsLetterMailable;
use App\NewsLetter;
use App\NewsLetterDetail;
use App\Subscriber;
use Illuminate\Console\Command;

class SendNewsLetters extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:news_letters';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add NewsLetters To All Customers In AluthAds System Mention About the Newly Added Advertisements in the System';

    protected $advertisements;
    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */

    public function handle()
    {
        $connection=null;
        $all_news_letters = NewsLetter::all();
        $all_subscribers = Subscriber::all();
        system("ping -c 1 google.com", $connection);
        if($connection==0) {
            //news letters Loop
            foreach ($all_news_letters as $news_letter) {
                NewsLetter::where('id', $news_letter->id)->update(['status' => 1]);
                //subscribers Loop
                foreach ($all_subscribers as $subscriber) {
                    $this->advertisements = NewsLetterDetail::where('newsletter_id', $news_letter->id)
                        ->join('advertisements', 'news_letter_details.advertisement_id', 'advertisements.id')
                        ->select('advertisements.*')
                        ->get();

                    Mail::to($subscriber->subscriber_email)->send(new SendNewsLetterMailable($this->advertisements, $news_letter));
                }
            }
            return redirect()->back();
        }else{
            return redirect()->back();
        }
    }
}
