<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Advertisement;

class MyAdsController extends Controller
{

    /**
     * Show My advertisements page
     */
    public function index(){
             return view('web.pages.my_ads', [
                 'advertisements' => Advertisement::WhereAuthUser()->get()
             ]);
    }

}
