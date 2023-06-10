<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class ActiveTicketController extends Controller
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

        $transactions = Transaction::where('customer_id', $userID)
            ->where('selected_date', '>=', now('Asia/Jakarta')->format('Y-m-d'))
            ->where('status', 'PAID')
            ->get();

        return view('active_ticket', 
        [
            'transactions' => $transactions
        ]);
    }
}
