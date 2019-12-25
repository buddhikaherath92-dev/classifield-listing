<?php

namespace App\Http\Controllers;

use App\Helpers\Common;
use Illuminate\Http\Request;
use App\Advertisement;
use Intervention\Image\ImageManager;

class MyAdsController extends Controller
{

    /**
     * Show My advertisements page
     */
    public function index()
    {
        return view('web.pages.my_ads', [
            'advertisements' => Advertisement::WhereAuthUser()->orderBy('created_at', 'dec')->get()

        ]);
    }

}

