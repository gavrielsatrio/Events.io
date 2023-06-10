<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class LoginController extends Controller
{
    public function render(Request $request)
    {
        $userID = $request->cookie('user_id');
        if($userID != null)
        {
            $user = User::find($userID)->first();
            if($user != null)
            {
                if($user->user_role_id == 3)
                {
                    // Event Organizer
                    return redirect("/eo-home")->with('user_id', $userID);
                }
                else
                {
                    // User
                    return redirect("/home")->with('user_id', $userID);
                }
            }
        }

        return view("login");
    }

    public function auth(Request $request)
    {
        $checkUser = User::where('email', $request->email)->where('password', $request->password)->first();
        if($checkUser === null)
        {
            return redirect('login')->with('error_message', 'Email or password is wrong');
        }

        Cookie::queue("user_id", $checkUser->id);

        if($checkUser->user_role_id === 2)
        {
            // Customer
            return redirect("/home");
        }
        else if($checkUser->user_role_id === 3)
        {
            // Event Organizer
            return redirect("/eo-home");
        }
    }
}
