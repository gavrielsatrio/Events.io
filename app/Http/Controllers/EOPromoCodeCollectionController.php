<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\EventPromo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

class EOPromoCodeCollectionController extends Controller
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

        $promoCodes = EventPromo::where('event.event_organizer_id', $userID)
            ->join('event', 'event_promo.event_id', '=', 'event.id')
            ->select([
                'event_promo.id',
                'event_promo.code',
                'event.name',
                'event.thumbnail_path',
                'event.banner_path',
                'event.gradient_cover_color'
            ])
            ->with('transactions')
            ->get();

        return view('eo_promo_code_collection', 
        [
            'promo_codes' => $promoCodes
        ]);
    }
}
