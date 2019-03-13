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
        $view_data = SuccessReferal::all();
        $visted=SuccessReferal::where('is_registered','=','0')->count();
        $register=SuccessReferal::where('is_registered','=','1')->count();
        $date=Invitaion::all();
        $shared_date=($date[0]['created_at']);

        return view('admin.pages.view_referals',[
            'view_data'=>$view_data,
            'visted'=>$visted,
            'register'=>$register,
            'shared_date'=>$shared_date,

        ]);

    }

    function showStatistics(Request $request){

    }
}

