<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class EOEventsController extends Controller
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

        $events = Event::where('event_organizer_id', $userID)->with('transactions')->get();

        return view('eo_events',
        [
            'events' => $events
        ]);
    }
}
