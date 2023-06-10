<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class SignUpController extends Controller
{
    public function render(Request $request, $role)
    {
        $userID = $request->cookie('user_id');
        if($userID != null)
        {
            $user = User::find($userID)->first();
            if($user != null)
            {
                return redirect('/');
            }
        }

        return view('sign_up', 
        [
            'role' => $role
        ]);
    }

    public function create(Request $request, $role)
    {
        $userRoleID = $role == "user" ? '2' : '3';

        $checkEmail = User::where('email', $request->email)->first();
        if($checkEmail != null)
        {
            return redirect("/sign-up/$role")->with([
                'message' => 'Email already registered'
            ]);
        }

        $checkPhone = User::where('phone', $request->phone_number)->first();
        if($checkPhone != null)
        {
            return redirect("/sign-up/$role")->with([
                'message' => 'Phone number already registered'
            ]);
        }

        User::create([
            'user_role_id' => $userRoleID,
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => $request->password,
            'date_of_birth' => $request->date_of_birth,
            'phone' => $request->phone_number
        ]);

        $lastUser = User::latest("id")->first();
        Cookie::queue("user_id", $lastUser->id);

        if($userRoleID == "2")
        {
            return redirect("/home");
        }
        else
        {
            return redirect("/eo-home");
        }
    }
}
