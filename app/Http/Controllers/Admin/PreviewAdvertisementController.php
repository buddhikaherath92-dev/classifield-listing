<?php

namespace App\Http\Controllers\Admin;

use App\Advertisement;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PreviewAdvertisementController extends Controller
{
    /**
     * Show preview advertisement page
     */
    public function show(){
      return view('admin.pages.view_advertisement', [
          'data' => Advertisement::find((int)request('id'))
      ]);
    }
}
