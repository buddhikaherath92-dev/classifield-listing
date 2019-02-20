<?php

namespace App\Http\Controllers;

use App\Helpers\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class MySettingsController extends Controller
{
    private $common;
    /**
     * MySettingsController constructor.
     */
    public function __construct(Common $common)
    {
        $this->common=$common;
    }

    /**
     * Show my settings page
     *
     */
    public function index(){
        return view('web.pages.my_settings');
    }

    /**
     * Update account settings
     *
     */
    public function store(){
        $incomingData = request()->validate([
            'password' => 'required|string|min:6|confirmed'
        ]);

        $incomingData['password'] = Hash::make($incomingData['password']);

        Auth::user()->update($incomingData);
        $this->common->showAlerts('','success',Auth::user()['name'].'\'s Profile password is updated Successfully !');
        return redirect()->back();

    }

}
