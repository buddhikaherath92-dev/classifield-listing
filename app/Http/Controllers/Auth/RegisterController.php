<?php

namespace App\Http\Controllers\Auth;

use App\Helpers\Common;
use App\Http\Controllers\InvitationController;
use App\Invitaion;
use App\Mail\SendMaillable;
use App\SuccessReferal;
use App\User;
use Alert;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Intervention\Image\ImageManager;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    private $common;
    private $imgManager;


    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/my_dashboard/profile';

    /**
     * Show the application registration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function showRegistrationForm()
    {
//        return view('emails.verify');
        return view('web.pages.register');
    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /**
     * MyAdsController constructor.
     */
    public function __construct(
        Common $common)
    {

        $this->common = $common;
        $this->imgManager = new ImageManager(array('driver' => 'gd'));
        $this->middleware('guest');

    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'tel_no' => 'required|regex:/(0)[0-9]{9}/',
            'account_type' => 'required',
            'email_code'=>'nullable',
        ]);
    }


    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function register(Request $request)
    {
        $this->validator($request->all())->validate();

        $inputData = $request->all();
        $inputData['email_code'] =  mt_rand(1000, 9999);

        event(new Registered($user = $this->create($inputData)));

        $this->guard()->login($user);

        return $this->registered($request, $user)
            ? : redirect($this->redirectPath());
    }


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */

    protected function create(array $data)
    {
        $type = $data['token'];
        if ($type != null) {
            $invitation_data = Invitaion::where('token', $type)->get()[0];

            SuccessReferal::where('user_id', $invitation_data->user_id)->update(['is_registered' => 1]);

            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'tel_no' => $data['tel_no'],
                'type' => (int)$data['account_type'],
                'email_code' => $data['email_code'],


            ]);

        } else {


            return User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'tel_no' => $data['tel_no'],
                'type' => (int)$data['account_type'],
                'email_code' => $data['email_code'],


            ]);
        }


    }

    /**
     * The user has been registered.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function registered(Request $request, $user)
    {
        $connection = null;//create a connection variable
        system("ping -c 1 google.com", $connection);//check if connection is available
        if ($connection == 0) {
            $email = $user->email;
            $pin = $user->email_code;
            Mail::to($email)->send(new SendMaillable($pin));
            $this->common->showAlerts('You Are Successfully Register To AluthAds','success',"You Will Send Our Subscribe E-Mail Shortly");

            return redirect('/show_verification');
        } else {
            $this->common->showAlerts('Please Check Your Internet Connection', 'error', "Can't Reach Server");
            return view('web.pages.register');
        }
    }


}
