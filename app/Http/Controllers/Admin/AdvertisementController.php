<?php

namespace App\Http\Controllers\Admin;

use App\Advertisement;
use App\Mail\SendMaillable;
use App\Mail\SendMessageMailable;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;

class AdvertisementController extends Controller
{

    /**
     * Show admin panel advertisements page
     * -----------------------------------------------------------------------------------------------------------------
     */
    public function show(Request $request){

        $advertisements = Advertisement::join('users', 'advertisements.user_id', '=', 'users.id');

        if($request->has('filter') && $request->get('filter') === 'active'){
            $advertisements = $advertisements->where('is_inactive', 0);
        }

        if($request->has('filter') && $request->get('filter') === 'inactive'){
            $advertisements = $advertisements->where('is_inactive', 1);
        }

        if($request->has('filter') && $request->get('filter') === 'featured'){
            $advertisements = $advertisements->where('is_featured', 1);
        }

        if($request->has('filter') && $request->get('filter') === 'non-featured'){
            $advertisements = $advertisements->where('is_featured', 0);
        }


        return view('admin.pages.advertisements',
            [
                'advertisements' => $advertisements
                    ->select('advertisements.id','advertisements.title', 'advertisements.category_id', 'advertisements.is_featured',
            'advertisements.is_inactive', 'advertisements.expire_date', 'users.name as username')->get()
        ]);
    }

    /**
     * Update advertisements settings
     * -----------------------------------------------------------------------------------------------------------------
     */
    public function update(){

        $data = request()->all();
        unset($data['_token']);
        unset($data['id']);
        $email1=Advertisement::join('users', 'advertisements.user_id', 'users.id')->where('advertisements.id',request('id'))->get();
        $email=($email1[0]['email']);
        $featured_add=" on featured advertisements";
        $featured_remove="remove from featured advertisements";
        $user_name=($email1[0]['name']);
        $activate_msg="on live ";
        $deactivate_msg="deactivated";
        $inactive=request('is_inactive');
        $featured_ad=request('is_featured');
        if (isset($inactive)){
            $status=$data['is_inactive'];
          if ($status==0){
              Mail::to($email)->send(new SendMessageMailable($activate_msg,$user_name));
          }else{
              Mail::to($email)->send(new SendMessageMailable($deactivate_msg,$user_name));
          }
        }else if(isset($featured_ad)){
            $featured=$data['is_featured'];
            if ($featured==1){
                Mail::to($email)->send(new SendMessageMailable($featured_add,$user_name));


           }else{
                Mail::to($email)->send(new SendMessageMailable($featured_remove,$user_name));

            }
        }

        Advertisement::where('id', request('id'))->update($data);

        return redirect('/admin/advertisements');
    }

}
