<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FaqController extends Controller
{
    
    // Show Help & FAQ page
    public function show(){
        return view('web.pages.faq');
    }

}
