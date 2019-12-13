<?php

namespace App\Http\Controllers\Admin;

use App\Invitaion;
use App\SuccessReferal;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ViewReferalsController extends Controller
{
    function show(){
        $view_data = SuccessReferal::join('users', 'success_referals.user_id', 'users.id')
            ->select('success_referals.user_id', 'users.email', 'users.name')->groupBy('success_referals.user_id')
            ->get();

        foreach ($view_data as $index => $user){
            $viewCount = SuccessReferal::where('user_id', $user->user_id)->where('is_registered','=','0')->count();
            $registeredCount = SuccessReferal::where('user_id', $user->user_id)->where('is_registered','=','1')->count();
            $view_data[$index]['visited_count'] = $viewCount;
            $view_data[$index]['registered_count'] = $registeredCount;
        }


        return view('admin.pages.view_referals',[
            'referrals'=>$view_data,
        ]);

    }
}

