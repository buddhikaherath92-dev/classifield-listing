<?php

namespace App\Http\Controllers;

use App\Helpers\Common;
use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

/**
 * @property  common
 */
class VerificationController extends Controller
{
    /*
   |--------------------------------------------------------------------------
   | Email Verification Controller
   |--------------------------------------------------------------------------
   |
   | This controller is responsible for handling email verification for any
   | user that recently registered with the application. Emails may also
   | be re-sent if the user didn't receive the original email message.
   |
   */
    private $common;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
//    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Common $common)
    {
        //$this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
        $this->common=$common;
    }
    /**
     * Show verification view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(){
        return view('web.pages.email_verification');
    }

    /**
     * check a verification code
     */
    public function checkVerifyCode(){
        if(request()->has('email_code')){
            $loggedUser = Auth::user();
            if($loggedUser->email_code === request('email_code')){
                $loggedUser->update([
                    'email_verified_at' => Carbon::now()
                ]);
                $this->common->showAlerts('', 'success', 'Your registration is Successful');
                 return redirect('/my_dashboard/profile');
            }else{
               $this->common->showAlerts('Invalid verification code', 'error', 'The verification code you entered is invalid');
               return redirect()->back();
            }
        }else{
            return redirect()->back();
        }
    }
}
