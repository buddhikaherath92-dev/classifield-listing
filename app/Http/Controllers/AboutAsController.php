<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\Mail\ExpireEmail;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;

class AboutAsController extends Controller

{
    public function show(){
        return view('web.pages.about_us');

    }
}
