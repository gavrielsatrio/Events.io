<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class SignOutController extends Controller
{
    public function signOut(Request $request)
    {
        Cookie::queue(Cookie::forget('user_id'));

        return redirect('/');
    }
}
