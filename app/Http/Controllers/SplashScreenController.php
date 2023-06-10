<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class SplashScreenController extends Controller
{
    public function render(Request $request)
    {
        if($request->cookie('user_id') == null)
        {
            return view("splash_screen");
        }

        $user = User::where('id', $request->cookie('user_id'))->get()->first();
        if($user == null)
        {
            Cookie::queue(Cookie::forget('user_id'));
            return redirect('/');
        }

        if($user->user_role_id == 3)
        {
            // Event Organizer
            return redirect("/eo-home")->with('user_id', $request->cookie('user_id'));
        }
        else
        {
            // User
            return redirect("/home")->with('user_id', $request->cookie('user_id'));
        }
    }
}
