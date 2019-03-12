<?php

namespace App\Console\Commands;

use App\Advertisement;
use App\Mail\ExpireEmail;
use App\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class AdExpired extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:ad_expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check current date with expire date and on the expire date advertisement will inactive and send a email to user';

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
        $advertisements=Advertisement::whereNotNull('expire_date')->get();
        $current_date=Carbon::now()->toDateString();
        foreach($advertisements as $advertisement){
            $expire_date=($advertisement->expire_date);
            if($current_date === $expire_date){
                $user=User::where('id',$advertisement->user_id)->get();
                $users=Advertisement::find($advertisement->id);
                $data['is_inactive']=1;
                $users->update($data);
                $email=($user[0]['email']);
                $name=($user[0]['name']);
                $message="your advertisement will expire today";
                Mail::to($email)->send(new ExpireEmail($message,$name));
            }
        
        }

    }
}

