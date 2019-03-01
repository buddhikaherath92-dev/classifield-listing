<?php
/**
 * Created by PhpStorm.
 * User: punsara
 * Date: 3/1/19
 * Time: 1:14 PM
 */

namespace App\Http\Controllers;


use App\Invitaion;
use App\SuccessReferal;
use Illuminate\Support\Facades\Auth;

class SuccessReferalController extends Controller
{
    public function redirect($token){
        $invitation=Invitaion::where('token',$token)->get()[0];
        if(!empty(array_filter((array)$invitation))){
            SuccessReferal::create([
                'user_id' => $invitation->user_id,
                'is_registered' => 0
            ]);
            return redirect('register')->with($token);
        }
    }
}