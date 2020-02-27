<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\Helpers\Common;
use App\Rating;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\ImageManager;
use Jorenvh\Share\Share;

class SingleAdvertisementController extends Controller
{

    private $common;
    private $imgManager;

    /**
     * MyAdsController constructor.
     */
    public function __construct(
        Common $common
    )
    {
        $this->common = $common;
        $this->imgManager = new ImageManager(array('driver' => 'gd'));
    }


    /**
     * View single advertisement
     * -----------------------------------------------------------------------------------------------------------------
     */
    public function show(Request $request){

        $previousRoute = str_replace(url('/'), '', url()->previous());

        $advertisement = Advertisement::where('slug', $request->slug)->first();
        $topKeyWord = explode(',', $advertisement->key_words)[0];
        $recentAds = Advertisement::where('key_words', 'LIKE', '%'.$topKeyWord)
            ->orWhere('subcategory_id', $advertisement->subcategory_id)
            ->orWhere('category_id', $advertisement->category_id )
            ->limit(4)->whereActive()->get();
        //$advertisement->increment('views');

        if($advertisement->is_inactive === 0 || ($advertisement->is_inactive === 1 && $previousRoute === '/my_dashboard/ads')){
            return view('web.pages.single_advertisement', [
                'advertisement' => $advertisement,
                'price_type'=>$advertisement->is_negotiable,
                'category' => config('constance.categories')[$advertisement->category_id]['name'],
                'seller' => User::where('id', $advertisement->user_id)->first(),
                'seller_ads' => $recentAds,
                'rating'=>Rating::where('slug',$request->slug)->average('rating'),
                'share'=> (new \Jorenvh\Share\Share)->currentPage()->currentPage()->facebook(),

            ]);
        }else{

            $this->common->showAlerts('Your are trying to view inactive advertisement!', 'error', "Your are trying to view inactive advertisement!");
            return redirect()->back();
        }


    }
}
