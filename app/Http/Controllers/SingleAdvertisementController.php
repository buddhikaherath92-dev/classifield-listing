<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\Helpers\Common;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Intervention\Image\ImageManager;

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
        $advertisement = Advertisement::where('slug', $request->slug)->first();
        if($advertisement->is_inactive === 0){
            return view('web.pages.single_advertisement', [
                'advertisement' => $advertisement,
                'price_type'=>$advertisement->is_negotiable,
                'category' => config('constance.categories')[$advertisement->category_id]['name'],
                'seller' => User::where('id', $advertisement->user_id)->first(),
                'seller_ads' => Advertisement::where('user_id', $advertisement->user_id)->where('is_inactive', 0)
                    ->limit(4)->orderBy('created_at', 'desc')->get()
            ]);
        }else{
            $this->common->showAlerts('Your Advertisement is still inactive', 'success', "Your Advertisement is still inactive");
            return redirect()->back();
        }

    }
}
