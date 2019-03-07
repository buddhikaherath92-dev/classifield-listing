<?php

namespace App\Http\Controllers;

use App\Helpers\Common;
use App\Rating;
use Illuminate\Validation\Validator;
use Illuminate\Http\Request;

class RatingController extends Controller
{
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
     * Update the specified resource in storage.
     *
     *
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $data=request()->validate([
            'email'=>'required|email',
            'ad_id'=>'required|integer',
            'slug'=>'required|string',
            'rating'=>'required|integer'
        ]);
        Rating::updateOrCreate(['email'=>$data['email'],'ad_id'=>$data['ad_id']],$data);
        $this->common->showAlerts('Rating Advertisement !','success',"Thank you for rating");
        return redirect()->back();
    }

}
