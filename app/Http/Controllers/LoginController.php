<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Show My advertisements page
     */

    public function show()
    {
        return view('web.pages.login');
    }

    /**
     * The user has been authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  mixed  $user
     * @return mixed
     */
    protected function authenticated(Request $request, $user)
    {
        if (request('login_type') !== null && $user->email_verified_at !== null ){
            $this->common->showAlerts('','success','Quick login Successful !');
            return Redirect::back();
        }

        if($user->email_verified_at !== null){
            $this->redirectTo = $user->type == config('constance.user_types')['admin'] ? '/admin/dashboard' :
                '/my_dashboard/profile';
            $this->common->showAlerts('','success','Login Successful !');
        }
    }
}
