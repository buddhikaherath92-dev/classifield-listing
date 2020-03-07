<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerAdsController extends Controller
{

    public function show(){
        $availablePages = config('constance.pages');
        $availableLocations = config('constance.locations');
        return view('admin.pages.banner_ads', [
            'pages' => $availablePages,
            'locations' => $availableLocations
        ]);
    }
}
