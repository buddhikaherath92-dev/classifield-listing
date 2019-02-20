<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\User;
use Illuminate\Http\Request;
use Alert;
class HomeController extends Controller
{

    /**
     * Show home page with relevant data
     */
    public function index(){

        return view('web.pages.home', [
            'categories' => Advertisement::CountByCategories(),
            'featured_advertisements' => Advertisement::where('is_featured', (int)1)->WhereActive()->get(),
            'recent_advertisements' => Advertisement::orderBy('created_at', 'desc')->take(8)->WhereActive()->get(),
            'advertisement_count' => Advertisement::where('is_inactive',0)->count(),
            'users_count' => User::where('type',1)->count()
        ]);
    }


}
