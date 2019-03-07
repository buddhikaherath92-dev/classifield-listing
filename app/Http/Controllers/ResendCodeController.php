<?php

namespace App\Http\Controllers;


use App\Helpers\Common;
use App\Mail\SendMaillable;
use http\Client\Curl\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\ImageManager;

class ResendCodeController extends Controller
{
    private $common;
    private $imgManager;

    /**
     * PostAdvertisementController constructor function
     * @param Common $common
     * @param ImageManager $imageManager
     */
    public function __construct(
        Common $common
    )
    {
        $this->common = $common;
        $this->imgManager = new ImageManager(array('driver' => 'gd'));
    }

    /**
     * resent a verification code
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public  function resendCode(Request $request)
    {
        $connection=null;//create a connection variable
        system("ping -c 1 google.com", $connection);//check if connection is available
        if($connection==0) {
            $pin = mt_rand(1000, 9999);
            Auth::user()->update([
                'email_code' => $pin
            ]);;

            Mail::to(Auth::user('email'))->send(new SendMaillable($pin));
            $this->common->showAlerts('You Are Successfully ResendCode To AluthAds','success',"You Will Send Our Subscribe E-Mail Shortly");

            return redirect('/show_verification');
        }else{
            $this->common->showAlerts('Please Check Your Internet Connection','error',"Can't Reach Server");
            return redirect('/show_verification');

        }


    }





}
