<?php

namespace App\Http\Controllers;

use App\Helpers\Common;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\ImageManager;

class MyProfileController extends Controller
{

    private $imgManager;
    private $common;
    /**
     * MyProfileController constructor function
     *
     */
    public function __construct(Common $common)
    {
        $this->middleware('auth');
        $this->imgManager = new ImageManager(array('driver' => 'gd'));
        $this->common=$common;
    }

    /**
     * Show my profile page
     */
    public function index(){
        return view('web.pages.my_profile');
    }

    /**
     * Update user profile information
     *
     */
    public function store(){

        $incomingData = request()->validate([
            'name' => 'required|string|max:255',
            'tel_no' => 'required|string',
            'account_type' => 'required|integer',
            'logo' => 'mimes:jpeg,jpg,png|max:2000',
        ]);

        $logo = null;

        if(request()->has('logo')){

            $imagePath   = 'images/user_profile_pictures/';
            $file        = request()->file('logo');
            $logo        = Auth::id().".".$file->getClientOriginalExtension();

            // move the file from tmp to the destination path
            $file->move($imagePath, $logo);

            $this->imgManager->make($imagePath.$logo)->resize(80, 80)->save();

        }

        if( $logo !== null ) $incomingData['logo'] = $logo;
        $incomingData['type'] = $incomingData['account_type'];

        Auth::user()->update($incomingData);
        $this->common->showAlerts('','success','Profile details updated!');
        return redirect()->back();

    }
}
