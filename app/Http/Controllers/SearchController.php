<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\Helpers\Common;

class SearchController extends Controller
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

    /**
     * Show search view according keyword
     * -----------------------------------------------------------------------------------------------------------------
     */
    public function show()
    {

        $heading = "Search result for ";//All Advertisements

        $advertisements = Advertisement::join('users', 'advertisements.user_id', 'users.id')->select('users.type', 'advertisements.*');

        if (request('ad_type') === 'corporate' || request('ad_type') === 'individual') {
            $advertisements = $advertisements->where('users.type',
                config('constance.user_types')[request('ad_type')]);
                request('district')!==null ?
                $heading = 'Search results for All '.request('ad_type').' Advertisements In '.request('district').' District.':
                $heading = 'Search results for All '.request('ad_type').' Advertisements';
        }

        if(request()->has('p_cat')){
            $advertisements = $advertisements->Where('category_id', request('p_cat'));
            $heading = 'Search results for '.$this->common->getCategoryObjectFromID((int)request('p_cat'))['name'].' Advertisements';
        }

        if (request('district') !== null) {
            $advertisements = $advertisements->Where('district', request('district'));
            $heading = 'Search results for '.$this->common->getCategoryObjectFromID((int)request('p_cat'))['name'].' Advertisements in ' .request('district').' District.';
        }

        if (request('keyword') !== null) {
            $advertisements = $advertisements->where('title', 'like', '%' . request('keyword') . '%')
                ->orWhere('key_words', 'like', '%' . request('keyword') . '%');
            $heading = 'Search results for ' . request('keyword');
        }



        if(request('keyword') === null && request('district') === null && request('ad_type') === 'all'){
            $heading = 'Search results for All Advertisements';
        }


        return view('web.pages.listing', [
            'advertisements' => $advertisements->WhereActive()->paginate(9),
            'categories' => Advertisement::CountByCategories(),
            'heading' => $heading,
            'search_query' => request('keyword'),
            'ad_type' => request('ad_type'),
            'district' => request('district'),
            'p_cat' => request('p_cat'),
        ]);

    }
}
