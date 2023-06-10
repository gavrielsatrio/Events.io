<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class AfterPaymentController extends Controller
{
    public function render(Request $request, $transactionID)
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

        $transaction = Transaction::find($transactionID);
        if($transaction == null)
        {
            return redirect('/');
        }

        return view("after_payment", 
        [
            'transaction' => $transaction
        ]);
    }
}
