<?php

namespace App\Http\Controllers;


use App\Invitaion;
use App\SuccessReferal;

class SuccessReferalController extends Controller
{
    public function redirect($token){
        $invitation=Invitaion::where('token',$token)->get()[0];
        if(!empty(array_filter((array)$invitation))){
            SuccessReferal::create([
                'user_id' => $invitation->user_id,
                'is_registered' => 0
            ]);
//            return redirect('register')->with($token);
            return redirect('register')->with('token', $token);
        }
    }
}
