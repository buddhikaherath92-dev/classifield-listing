<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutUsController extends Controller
{

    public function show()
    {

        return view('web.pages.about_us');
    }
}
