<?php

namespace App\Http\Controllers;


use App\Mail\SendMaillable;
use http\Client\Curl\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class ResendCodeController extends Controller
{

    /**
     * generate a pin
     *
     *
     *
     * @param $digits
     * @return $pin
     */
    function generatePIN($digits = 4){
        $i = 0; //counter
        $pin = ""; //our default pin is blank.
        while($i < $digits){
            //generate a random number between 0 and 9.
            $pin .= mt_rand(0, 9);
            $i++;
        }
        return $pin;
    }


    /**
     * resent a verification code
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public  function resendCode(Request $request)
    {

        $email=(request()->user()->email);
        $user_emailCode=Auth::user();

        $inputData=  $this->generatePIN();
        if($user_emailCode->email_code!= $inputData){
            $user_emailCode->update([
              'email_code' == $inputData
            ]);
            Mail::to($email)->send(new SendMaillable($inputData));
            return redirect('/show_verification');
        }else{
            return redirect('/show_verification');
        }



    }





}
