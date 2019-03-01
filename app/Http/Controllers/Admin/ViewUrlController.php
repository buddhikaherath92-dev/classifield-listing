<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ViewUrlController extends Controller
{
    public function show(){
        return view('admin.pages.view_url');
    }
}
