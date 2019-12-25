<?php

namespace App\Http\Controllers;

use App\Helpers\Common;
use Illuminate\Http\Request;
use App\Advertisement;
use Intervention\Image\ImageManager;

class MyAdsController extends Controller
{

    private $common;
    private $imgManager;

    /**
     * PostAdvertisementController constructor function
     * @param Common $common
     * @param ImageManager $imageManager
     */
    public function __construct(
        Common $common
    )
    {
        $this->common = $common;
        $this->imgManager = new ImageManager(array('driver' => 'gd'));
    }

    /**
     * Show My advertisements page
     */
    public function index()
    {
        return view('web.pages.my_ads', [
            'advertisements' => Advertisement::WhereAuthUser()->orderBy('created_at', 'dec')->get()
        ]);
    }

    /**
     * Show edit advertisement page
     */
    public function editAd() {
        $advertisement = Advertisement::find(request('id'));
        if($advertisement->is_inactive){
            return view('web.pages.my_ads_edit', [
                'advertisement' => $advertisement,
                'categories' => config('constance.categories'),
                'districts' => config('constance.districts')
            ]);
        }else{
            $this->common->showAlerts('Edit live Advertisement !','info',
                "You cannot edit live ads. Please contact us on  info@aluthads.lk");
            return redirect()->back();
        }
    }

}

