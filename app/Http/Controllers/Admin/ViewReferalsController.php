<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ViewReferalsController extends Controller
{
    function show(){
        return view('admin.pages.view_referals');
    }
}
