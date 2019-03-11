<?php

namespace App\Http\Controllers;

use App\Advertisement;
use function GuzzleHttp\Promise\all;
use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Mail;
use Symfony\Component\VarDumper\Caster\DateCaster;

class AboutAsController extends Controller
{

    public function show()
    {

        return view('web.pages.about_us');

    }
}
