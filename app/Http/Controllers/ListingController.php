<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\Helpers\Common;
use Illuminate\Http\Request;

class ListingController extends Controller
{
    private $common;

    public function __construct(
        Common $common
    )
    {
        $this->common = $common;
    }

    /**
     * Show listing view according to given filers
     * -----------------------------------------------------------------------------------------------------------------
     */
    public function show(Request $request){

        $query = $request->slug;

        $advertisements = [];
        $heading = 'All Ads';
        $p_cat = null;


        switch ($query){
            case $query == 'corporate_ads' :
                $advertisements = Advertisement::join('users', 'advertisements.user_id', 'users.id')
                    ->where('users.type', config('constance.user_types')['corporate'])
                    ->select('advertisements.*')->WhereActive()->paginate(9);
                $heading = 'corporate advertisements';
                break;
            case $query == 'individual_ads' :
                $advertisements = Advertisement::join('users', 'advertisements.user_id', 'users.id')
                    ->where('users.type', config('constance.user_types')['individual'])
                    ->select('advertisements.*')->WhereActive()->paginate(9);
                $heading = 'individual advertisements';
                break;
            default :
                if ($catId = $this->common->getCategoryIdFromSlug($query)){
                    $advertisements = Advertisement::where('category_id', $catId)->WhereActive()->paginate(9);
                    $heading = $this->common->getCategoryObjectFromID($catId)['name'].' Advertisements';
                    $p_cat = $catId;
                }else if($subId = $this->common->getSubCategoryIdFromSlug($query)){
                    $advertisements = Advertisement::where('subcategory_id', $subId)->WhereActive()->paginate(9);
                    $heading = $this->common->getCategoryObjectFromSubID($subId)['name'].' Advertisements';
                }
        }

        return view('web.pages.listing', [
            'advertisements' => $advertisements,
            'categories' => Advertisement::CountByCategories(),
            'heading' => $heading,
            'ad_type'=>request('ad_type'),
            'search_query' => request('keyword'),
            'district' => request('district'),
            'p_cat' =>  $p_cat
        ]);

    }
}
