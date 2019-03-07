<?php

namespace App\Http\Controllers;

use App\Mail\SendFeaturedRequest;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Advertisement;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;
use App\Helpers\Common;
use Intervention\Image\ImageManager;
use Illuminate\Support\Facades\File;
use Alert;

class PostAdvertisementController extends Controller
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
     * Show post advertisement page
     */
    public function index()
    {
        $user = Auth::user();
//        dd($user);
        if ($user == null) {
            return redirect('/login');
        }
        $email_verified_at = request()->user()->email_verified_at;

        if ($email_verified_at == null) {
            return redirect('/show_verification');
        }
        $checkBox = 0;
        if (isset($_GET['ad'])) {
            $_GET['ad'] === 'Premium' ? $checkBox = 1 : $checkBox = 0;
        }
        return view('web.pages.post_advertisement', [
            'categories' => config('constance.categories'),
            'districts' => config('constance.districts'),
            'checkbox' => $checkBox
        ]);
    }



    /**
     * Add new advertisement
     */
    public function store()
    {

        if (Auth::check()) {

            $incomingData = request()->validate([
                'title' => 'required|string',
                'description' => 'required|string',
                'category_id' => 'required|integer',
                'subcategory_id' => 'required|integer',
                'district' => 'string|nullable',
                'img_1' => 'image|mimes:jpeg,jpg,png|max:2000|required',
                'img_2' => 'image|mimes:jpeg,jpg,png|max:2000',
                'img_3' => 'image|mimes:jpeg,jpg,png|max:2000',
                'is_negotiable' => 'integer',
                'price' => 'required|min:2|regex:/^\d*(\.\d{1,2})?$/'
            ]);

            $img_1   = null;
            $img_2   = null;
            $img_3   = null;

            $count=Advertisement::count()+1;

            $slug  = $this->common->slugify($incomingData['title']).$count;
            if(request()->has('img_1')){


                $imagePath   = 'images/advertisements/';
                $file        = request()->file('img_1');
                $img_1    = $slug."_img_1.".$file->getClientOriginalExtension();

                // move the file from tmp to the destination path
                $file->move($imagePath, $img_1);

                $this->imgManager->make($imagePath.$img_1)->resize(null, 500, function ($constraint) {
                    $constraint->aspectRatio();
                })->save();


            }

            if(request()->has('img_2')){


                $imagePath   = 'images/advertisements/';
                $file        = request()->file('img_2');
                $img_2    = $slug."_img_2.".$file->getClientOriginalExtension();

                // move the file from tmp to the destination path
                $file->move($imagePath, $img_2);

                $this->imgManager->make($imagePath.$img_2)->resize(null, 500, function ($constraint) {
                    $constraint->aspectRatio();
                })->save();

            }

            if(request()->has('img_3')){


                $imagePath   = 'images/advertisements/';
                $file        = request()->file('img_3');
                $img_3    = $slug."_img_3.".$file->getClientOriginalExtension();

                // move the file from tmp to the destination path
                $file->move($imagePath, $img_3);

                $this->imgManager->make($imagePath.$img_3)->resize(null, 500, function ($constraint) {
                    $constraint->aspectRatio();
                })->save();

            }

            $incomingData['user_id'] = Auth::id();
            $incomingData['is_featured'] = (int)0;
            $incomingData['is_inactive'] = (int)1;
            $incomingData['slug'] = $slug;
            $incomingData['img_1'] = $img_1;
            $incomingData['img_2'] = $img_2;
            $incomingData['img_3'] = $img_3;

            $advertisement=Advertisement::create($incomingData);
            $featured=request('featured');

            if ($featured){
                Mail::to(config('constance.admin_email'))->send(new SendFeaturedRequest(Auth::user(),$advertisement));
                $this->common->showAlerts('Posting Featured Advertisement !','success',"Advertisement posted successfully!");
                return redirect('/my_dashboard/ads');
            }
            $this->common->showAlerts('Posting Advertisement !','success',"Advertisement posted successfully!");
            return redirect('/my_dashboard/ads');

        }
    }

    /**
     * Retrieve the subcategories for relevant category
     *@return array
     * */
    public function getSub(){
        $cat_id=$_GET['id'];
        return config('constance.categories')[$cat_id]['sub_cat'];
    }
}
