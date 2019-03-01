<?php

namespace App\Http\Controllers\Admin;

use App\Mail\SendNewsLetterMailable;
use App\NewsLetterDetail;
use App\Subscribers;
use App\NewsLetter;
use App\Http\Requests;
use App\Advertisement;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class NewsLetterController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show(Request $request)
    {
        $advertisement = Advertisement::get();
        $newsletters = NewsLetter::get();
        return view('admin.pages.newsletter', [
            'advertisements' => $advertisement,
            'newsletters' => $newsletters
        ]);
    }

    public function store()
    {
        //Get incoming Data
        $incoming_data = request()->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'array_data' => 'required|string'
        ]);

        //Set Newsletter Data Hit Query
        $incoming_data['status'] = 0;
        $newsletter = NewsLetter::create($incoming_data);

        //Split String Array
        $splitted_array = explode(',', $incoming_data['array_data']);
        foreach ($splitted_array as $split) {
            NewsLetterDetail::create([
                'newsletter_id' => $newsletter->id,
                'advertisement_id' => $split
            ]);
        }
        return redirect()->back();
    }

    public function preview(Request $newsletter)
    {
        $advertisement_data = [];
        $newsleter_details = NewsLetterDetail::where('newsletter_id', $newsletter->id)->get();
        foreach ($newsleter_details as $newsleter_detail) {
            array_push($advertisement_data, Advertisement::where('id', $newsleter_detail->advertisement_id)->get()[0]);
        }
        return new SendNewsLetterMailable($advertisement_data, NewsLetter::where('id', $newsletter->id)->get()[0]);
    }
}
