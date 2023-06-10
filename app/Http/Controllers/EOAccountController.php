<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class EOAccountController extends Controller
{
    public function render(Request $request)
    {
        $userID = $request->cookie('user_id');
        if($userID == null)
        {
            return redirect('/');
        }

        $user = User::find($userID);
        if($user == null)
        {
            Cookie::queue(Cookie::forget('user_id'));
            return redirect('/');
        }

        return view('eo_account', 
        [
            'user' => $user
        ]);
    }
}
