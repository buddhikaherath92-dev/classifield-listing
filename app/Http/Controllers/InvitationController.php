<?php

namespace App\Http\Controllers;

use App\Invitaion;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class InvitationController extends Controller
{
    /**
     * create a invitation link
     */
    public  function createToken()
    {

        $user=(Auth::user()->id);
        $time=Carbon::now();
        $newToken=mt_rand(1000, 9999);
        $uniqueTokenFound = false;

        while ($uniqueTokenFound){
            Invitaion::where('token', $newToken)->count() == 0 ? $uniqueTokenFound = true : 
                $newToken=mt_rand(1000, 9999);
        }

                Invitaion::create(['user_id' => $user , 'created_at' => $time,'token'=>$newToken]);

       $url= url("/invitation/redirect/{$newToken}");
//       dd($url);


        return redirect()->back()->with('status', $url);

        }


}
