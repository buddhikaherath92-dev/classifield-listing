<?php
/**
 * Created by PhpStorm.
 * User: oshadhi
 * Date: 3/1/19
 * Time: 3:38 PM
 */

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