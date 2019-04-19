<?php
/**
 * Created by IntelliJ IDEA.
 * User: sanju
 * Date: 4/18/19
 * Time: 12:06 PM
 */

namespace App\Http\Controllers;
use App\Mail\sendAdminMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class AdminMessageController extends Controller{

    /**
     * @param Request $request
     * @return mixed
     */
      function index(Request $request){

          $emailAddress="gamagethilini82@gmail.com";
//        $emailAddress =env('ADMIN_EMAIL',"gamagethilini82@gmail.com);
          $name=request()->all()['name'];
          Mail::to($emailAddress)->send(new sendAdminMessage($name));
          Return redirect('/contact');

    }

}