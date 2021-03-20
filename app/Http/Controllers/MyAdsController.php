<?php

namespace App\Http\Controllers;

use App\Helpers\Common;
use App\Mail\SendFeaturedRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Advertisement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Intervention\Image\ImageManager;

class MyAdsController extends Controller
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
     * Show My advertisements page
     */
    public function index()
    {
        $advertisements = Advertisement::WhereAuthUser();
        $orderBy = request()->has('order_by')? request('order_by') :'created_at';
        $status = request()->has('status')? request('status') : null;

        if(request()->has('status')){
            if(request('status') === 'active'){
                $advertisements = $advertisements->where('is_inactive', 0);
            }
            if(request('status') === 'inactive'){
                $advertisements = $advertisements->where('is_inactive', 1);
            }
            if(request('status') === 'featured'){
                $advertisements = $advertisements->where('is_featured', 1);
            }
        }

        return view('web.pages.my_ads', [
            'advertisements' => $advertisements->orderBy($orderBy, 'dec')->get(),
            'order_by' => $orderBy,
            'status' => $status
        ]);
    }

    /**
     * Show edit advertisement page
     */
    public function editAd() {
        $advertisement = Advertisement::find(request('id'));
        if($advertisement->is_inactive){
            return view('web.pages.my_ads_edit', [
                'advertisement' => $advertisement,
                'categories' => config('constance.categories'),
                'districts' => config('constance.districts')
            ]);
        }else{
            $this->common->showAlerts('Edit live Advertisement !','info',
                "You cannot edit live ads. Please contact us on  info@aluthads.lk");
            return redirect()->back();
        }
    }

    /**
     * Update advertisement
     */
    public function updateAd() {
        $advertisement = Advertisement::find(request('id'));
        $incomingData = request()->validate([
            'title' => 'required|string',
            'summary-ckeditor' => 'required|string',
            'category_id' => 'required|integer',
            'subcategory_id' => 'required|integer',
            'district' => 'string|nullable',
            'img_1' => 'mimes:jpeg,jpg,png|max:2000',
            'img_2' => 'mimes:jpeg,jpg,png|max:2000',
            'img_3' => 'mimes:jpeg,jpg,png|max:2000',
            'img_4' => 'mimes:jpeg,jpg,png|max:2000',
            'is_negotiable' => 'integer',
            'price' => request('is_negotiable') == '0' ? 'required|min:2|regex:/^\d*(\.\d{1,2})?$/' :
                'nullable|regex:/^\d*(\.\d{1,2})?$/',
            'key_words' => 'required'
        ]);
        $img_1   = $advertisement->img_1;
        $img_2   = $advertisement->img_2;
        $img_3   = $advertisement->img_3;
        $img_4   = $advertisement->img_4;
        $slug = $advertisement->slug;
        if($advertisement->title !== request('title')){
            $count=Advertisement::count()+1;
            $slug  = $this->common->slugify($incomingData['title']).$count;
            $advertisement->slug = $slug;
        }
        if(request()->has('img_1')){
            $imagePath   = 'images/advertisements/';
            $file        = request()->file('img_1');
            $img_1    = $slug."_img_1.".$file->getClientOriginalExtension();
            $file->move($imagePath, $img_1);
            $this->imgManager->make($imagePath.$img_1)->resize(null, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save();
        }
        if(request()->has('img_2')){
            $imagePath   = 'images/advertisements/';
            $file        = request()->file('img_2');
            $img_2    = $slug."_img_2.".$file->getClientOriginalExtension();
            $file->move($imagePath, $img_2);
            $this->imgManager->make($imagePath.$img_2)->resize(null, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save();
        }
        if(request()->has('img_3')){
            $imagePath   = 'images/advertisements/';
            $file        = request()->file('img_3');
            $img_3    = $slug."_img_3.".$file->getClientOriginalExtension();
            $file->move($imagePath, $img_3);
            $this->imgManager->make($imagePath.$img_3)->resize(null, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save();
        }
        if(request()->has('img_4')){
            $imagePath   = 'images/advertisements/';
            $file        = request()->file('img_4');
            $img_4    = $slug."_img_4.".$file->getClientOriginalExtension();
            $file->move($imagePath, $img_4);
            $this->imgManager->make($imagePath.$img_4)->resize(null, 500, function ($constraint) {
                $constraint->aspectRatio();
            })->save();
        }
        $incomingData['slug'] = $slug;
        $incomingData['img_1'] = $img_1;
        $incomingData['img_2'] = $img_2;
        $incomingData['img_3'] = $img_3;
        $incomingData['img_4'] = $img_4;
        $incomingData['created_at'] = Carbon::now();
        $incomingData['updated_at'] = Carbon::now();
        $result=Advertisement::where('id', request('id'))->update($incomingData);
        $featured=request('featured');
        if ($featured){
            Mail::to(config('constance.admin_email'))->send(new SendFeaturedRequest(Auth::user(), Advertisement::find(request('id'))));
            $this->common->showAlerts('Updating Advertisement !','success',"Advertisement updated successfully!");
            return redirect('/my_dashboard/ads');
        }
        $this->common->showAlerts('Updating Advertisement !','success',"Advertisement updated successfully!");
        return redirect('/my_dashboard/ads');
    }

    /**
     * Delete advertisement
     *
     */
    public function deleteAd() {
        $advertisement = Advertisement::find(request('id'));
        if($advertisement->is_inactive){
            Advertisement::where('id', request('id'))->delete();
            $this->common->showAlerts('Deleting Advertisement !','success',"Advertisement deleted successfully!");
        }else{
            Advertisement::where('id', request('id'))->update(['is_inactive'=> 1]);
            $this->common->showAlerts('Deleting Advertisement !','success',"We made your live advertisement inactive!");
        }
        return redirect('/my_dashboard/ads');
    }

}

