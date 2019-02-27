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
    public function show(Request $request)
    {
        $advertisement = Advertisement::get();
        return view('admin.pages.newsletter', [
            'advertisements' => $advertisement
        ]);
    }

    public function store()
    {
        if(Auth::check()){
            //Get incoming Data
            $incoming_data=request()->validate([
                'title' => 'required|string',
                'description' => 'required|string',
                'array_data' => 'required|string'
            ]);

            //Set Newsletter Data Hit Query
            $incoming_data['status']=1;
            $newsletter = NewsLetter::create($incoming_data);

            //Split String Array
            $splitted_array = explode(',', $incoming_data['array_data']);
            foreach ($splitted_array as $split){
               NewsLetterDetail::create([
                   'newsletter_id' => $newsletter->id,
                   'advertisement_id' => $split
               ]);
            }
            return redirect()->back();
        }
    }
}
