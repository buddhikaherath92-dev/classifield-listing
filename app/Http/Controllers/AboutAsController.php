<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutAsController extends Controller
{

    public function show()
    {

        return view('web.pages.about_us');
    }
}
