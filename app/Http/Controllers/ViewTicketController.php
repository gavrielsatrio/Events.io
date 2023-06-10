<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use App\Models\User;
use Illuminate\Http\Request;

class ViewTicketController extends Controller
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

        return view('view_ticket', 
        [
            'transaction' => $transaction
        ]);
    }
}
