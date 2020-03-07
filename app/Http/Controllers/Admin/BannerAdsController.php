<?php

namespace App\Http\Controllers\Admin;

use App\BannerAd;
use App\Helpers\Common;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BannerAdsController extends Controller
{

    private $common;

    /**
     * PostAdvertisementController constructor function
     * @param Common $common
     */
    public function __construct(
        Common $common
    )
    {
        $this->common = $common;
    }

    public function show(){
        $availablePages = config('constance.pages');
        $availableLocations = config('constance.locations');
        return view('admin.pages.banner_ads', [
            'pages' => $availablePages,
            'locations' => $availableLocations
        ]);
    }

    public function store(){
        $incomingData = request()->validate([
            'page' => 'required|string',
            'location' => 'required|string',
            'img' => 'required',
            'expire_date' => 'required',
            'is_active' => 'required|integer',
        ]);
        BannerAd::create($incomingData);
        $this->common->showAlerts('Posting Advertisement !','success',"Advertisement posted successfully!");
        return redirect('/admin/banner_ads');
    }
}
