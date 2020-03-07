<?php

namespace App\Http\Controllers\Admin;

use App\BannerAd;
use App\Helpers\Common;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;

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
        $bannerAds = BannerAd::all();
        return view('admin.pages.banner_ads', [
            'pages' => $availablePages,
            'locations' => $availableLocations,
            'bannerAds' => $bannerAds
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
        $imagePath   = 'images/banner_ads/';
        $file        = request()->file('img');
        $img_1    = "banner_ad_".$file->getClientOriginalName().$file->getClientOriginalExtension();

        $incomingData['img'] = $img_1;

        // move the file from tmp to the destination path
        $file->move($imagePath, $img_1);
        BannerAd::create($incomingData);
        $this->common->showAlerts('Posting Advertisement !','success',"Advertisement posted successfully!");
        return redirect('/admin/banner_ads');
    }
}
