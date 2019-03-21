<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Common;
use App\Http\Controllers\Controller;
use App\Http\Controllers\SweetAlertController;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/show_verification';
    private $common;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Common $common)
    {
        $this->common = $common;
        $this->middleware('guest')->except('logout');
    }

    /**
     * Show the application's login form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showLoginForm()
    {
        return redirect('/');
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  mixed $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        if (request('login_type') !== null && $user->email_verified_at !== null) {
            return redirect()->back();
        }

        if ($user->email_verified_at !== null) {
            $this->redirectTo = $user->type == config('constance.user_types')['admin'] ? '/admin/dashboard' :
               '/post_advertisement';
            return $this->common->showAlerts('', 'success', 'Login Successful !');
        }
    }

    /**
     * Get the failed login response instance.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Symfony\Component\HttpFoundation\Response
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    protected function sendFailedLoginResponse(Request $request)
    {
        throw ValidationException::withMessages([
            $this->username() => [trans('auth.failed')],
        ])->errorBag('login');
    }

}
