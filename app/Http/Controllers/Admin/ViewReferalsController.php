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
        $date=Carbon::now();
        return view('admin.pages.view_referals',[
            'view_data'=>$view_data,
            'visted'=>$visted,
            'register'=>$register,
            'date'=>$date,

        ]);

    }

    function showStatistics(Request $request){

    }
}

