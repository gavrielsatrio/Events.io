<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Transaction;
use App\Models\EventPromo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class PaymentController extends Controller
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
        if($transaction->status == "PAID")
        {
            return redirect("");
        }
        else if($transaction->status == "UNPAID")
        {
            return redirect("/pre-payment/$transactionID");
        }
        else if($transaction->status == "WAITING FOR PAYMENT")
        {
            return view('payment', 
            [
                'transaction' => $transaction
            ]);
        }
    }

    public function applyPromo(Request $request, $transactionID)
    {
        $transaction = Transaction::find($transactionID);

        $checkPromo = EventPromo::where('code', $request->code)
            ->where('event_id', $transaction->event->id)
            ->where('start_date', '<=', now('Asia/Jakarta'))
            ->where('end_date', '>=', now('Asia/Jakarta'))
            ->first();

        $message = "Promo successfully applied";
        if($checkPromo == null)
        {
            $message = "Promo code is invalid or expired";
        }

        return redirect("/payment/$transactionID")->with([
            'message' => $message,
            'promo' => $checkPromo
        ]);
    }

    public function pay(Request $request, $transactionID)
    {
        Transaction::find($transactionID)->update([
            'payment_method' => $request->payment_method,
            'event_promo_id' => $request->promo_id == 'NULL' ? NULL : $request->promo_id,
            'status' => 'PAID'
        ]);

        return redirect("/after-payment/$transactionID");
    }
}
