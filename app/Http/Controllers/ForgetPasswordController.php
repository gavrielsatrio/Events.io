<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\ForgetPasswordMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class ForgetPasswordController extends Controller
{
    public function render(Request $request)
    {
        $userID = $request->cookie('user_id');
        if($userID != null)
        {
            $user = User::find($userID);
            if($user != null)
            {
                return redirect('/');
            }
        }

        return view('forget_password');
    }

    public function sendEmail(Request $request)
    {
        $user = User::where('email', $request->account_email);
        if($user->first() == null)
        {
            return redirect('/forget-password')->with([
                'status' => 'fail',
                'message' => "Your account's email is not found"
            ]);
        }

        $newPassword = Str::random(16);

        $user->update([
            'password' => $newPassword
        ]);

        Mail::to($request->recovery_email)->send(new ForgetPasswordMail($user->first(), $newPassword));

        return redirect('/forget-password')->with([
            'status' => 'success',
            'header' => "Reset password email has been sent",
            'description' => "Check your recovery email's inbox and try re-login with the newly generated password"
        ]);
    }
}
