<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\EventTicketCategory;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class PrePaymentController extends Controller
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

        return view('pre_payment', 
        [
            'user' => User::find($userID),
            'transaction' => $transaction
        ]);
    }

    public function pay(Request $request, $transactionID)
    {
        Transaction::find($transactionID)->update([
            'start_pay_date' => now('Asia/Jakarta'),
            'status' => 'WAITING FOR PAYMENT'
        ]);

        return redirect("/payment/$transactionID");
    }

    public function cancel(Request $request, $transactionID)
    {
        Transaction::find($transactionID)->update([
            'status' => 'CANCEL'
        ]);

        return redirect("/home");
    }
}
