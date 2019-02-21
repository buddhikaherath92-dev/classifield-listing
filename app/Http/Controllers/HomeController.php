<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\Subscriber;
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

    public function subscribe()
    {
        $incomingData = request()->validate(['email_subscribe' => 'required|string|min:6']);
        Subscriber::create([
            'subscriber_email' => $incomingData['email_subscribe']
        ]);
        return redirect()->back();
    }
}
