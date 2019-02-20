<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{

    /**
     * Show admin panel dashboard
     * -----------------------------------------------------------------------------------------------------------------
     */
    public function show(){
        return view('admin.pages.dashboard');
    }

}
