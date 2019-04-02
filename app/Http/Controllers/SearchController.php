<?php

namespace App\Http\Controllers;

use App\Advertisement;

class SearchController extends Controller
{

    /**
     * Show search view according keyword
     * -----------------------------------------------------------------------------------------------------------------
     */
    public function show()
    {

        $heading = "Search result for ";//All Advertisements

        $advertisements = Advertisement::join('users', 'advertisements.user_id', 'users.id');

        if (request('ad_type') === 'corporate' || request('ad_type') === 'individual') {
            $advertisements = $advertisements->where('users.type',
                config('constance.user_types')[request('ad_type')]);
                request('district')!==null ?
                $heading = 'Search results for All '.request('ad_type').' Advertisements In '.request('district').' District.':
                $heading = 'Search results for All '.request('ad_type').' Advertisements';
        }

        if (request('district') !== null) {
            $advertisements = $advertisements->Where('district', request('district'));
            $heading = 'Search results for '.request('ad_type').' Advertisements in ' .request('district').' District.';
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
            'district' => request('district')
        ]);

    }
}
