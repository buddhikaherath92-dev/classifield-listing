<?php
/**
 * Created by IntelliJ IDEA.
 * User: sanju
 * Date: 4/18/19
 * Time: 12:06 PM
 */

namespace App\Http\Controllers;
use App\Helpers\Common;
use App\Mail\sendAdminMessage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

/**
 * @property Common common
 */
class AdminMessageController extends Controller{
    /**
     * AdminMessageController constructor.
     */
    public function __construct(Common $common)
    {
        $this->common = $common;
    }

    /**
     * @param Request $request
     * @return mixed
     */


      function index(Request $request){

//          $emailAddress="gamagethilini82@gmail.com";
           $emailAddress=env('ADMIN_EMAIL');
//        $emailAddress =env('ADMIN_EMAIL',"gamagethilini82@gmail.com);
          $name=request()->all()['name'];
          Mail::to($emailAddress)->send(new sendAdminMessage($name));
          $this->common->showAlerts('You Are Successfully send a Message','success',"You Will Receive a Reply");

          Return redirect('/contact');

      }

}