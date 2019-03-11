<?php

namespace App\Console\Commands;

use App\Advertisement;
use App\Mail\SentExpireDateUser;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class ExpireDate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:ExpireDate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'check current date with expire date and send a email before two days to expire the advertisements';

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


        $advertisements = Advertisement::all();


        foreach ($advertisements as $advertisement) {
            $expire_Date = $advertisement['expire_date'];//Expire Date
            $currentDate = Carbon::today()->toDateString();//Current Date
            $daystosum = '2';
            $datesum = date('Y-m-d', strtotime($currentDate . ' + ' . $daystosum . ' days'));

            if ($datesum == $expire_Date) {
                $user= User::where('id',$advertisement->user_id)->get();
                $email=($user[0]['email']);
                $name=($user[0]['name']);
                Mail::to($email)->send(new SentExpireDateUser($expire_Date,$name));

            }
        }




    }

}
