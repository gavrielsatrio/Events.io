<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\EventPromo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class AddPromoCodeController extends Controller
{
    public function render(Request $request, $eventID)
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

        return view('add_promo_code', 
        [
            'event_id' => $eventID
        ]);
    }

    public function add(Request $request)
    {
        $checkPromoCode = EventPromo::where('code', $request->code)->first();
        if($checkPromoCode != null)
        {
            return redirect("/eo-event/$request->event_id/add-promo-code")->with([
                'message' => 'This promo code has been taken'
            ]);
        }

        EventPromo::create([
            'event_id' => $request->event_id,
            'code' => strtoupper($request->code),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'discount_percentage' => $request->discount_percentage,
            'description' => $request->description
        ]);

        return redirect("eo-event/$request->event_id/add-promo-code/success");
    }

    public function success(Request $request)
    {
        return view('success_event_promo_code');
    }
}
