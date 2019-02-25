<?php

namespace App\Http\Controllers;

use App\Advertisement;
use App\Helpers\Common;
use App\Mail\SubscribeMailable;
use App\Subscriber;
use App\User;
use Illuminate\Http\Request;
use Alert;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\ImageManager;

class HomeController extends Controller
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
        $is_sxists=Subscriber::where($incomingData['email_subscribe']);
        if(is_null($is_sxists)){
            Subscriber::create([
                'subscriber_email' => $incomingData['email_subscribe']
            ]);
            Mail::to($incomingData['email_subscribe'])->send(new SubscribeMailable($incomingData['email_subscribe']));
            $this->common->showAlerts('You Are Successfully Subscribed To AluthAds','success',"You Will Send Our Subscribe E-Mail Shortly");
            return redirect()->back();
        }elseif($is_sxists!=null){
            $this->common->showAlerts('You Are Already Subscribed To AluthAds','error',"No Need To Subscribe Again");
            return redirect()->back();
        }
    }
}
