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
     * resent a verification code
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public  function resendCode(Request $request)
    {
        $pin=mt_rand(1000, 9999);
        Auth::user()->update([
            'email_code'=>$pin
        ]);;

        Mail::to(Auth::user('email'))->send(new SendMaillable($pin));
        return redirect('/show_verification');
    }





}
