<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\User;
use Illuminate\Http\Request;

class SingleAdvertisementController extends Controller
{

    /**
     * View single advertisement
     * -----------------------------------------------------------------------------------------------------------------
     */
    public function show(Request $request){
        $advertisement = Advertisement::where('slug', $request->slug)->first();
        return view('web.pages.single_advertisement', [
            'advertisement' => $advertisement,
            'price_type'=>$advertisement->is_negotiable,
            'category' => config('constance.categories')[$advertisement->category_id]['name'],
            'seller' => User::where('id', $advertisement->user_id)->first(),
            'seller_ads' => Advertisement::where('user_id', $advertisement->user_id)->where('is_inactive', 0)
                ->limit(4)->orderBy('created_at', 'desc')->get()
        ]);
    }
}
