<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class EOCalendarController extends Controller
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

        $allEvents = Event::where('event_organizer_id', $userID)->get();
        $events = Event::where('event_organizer_id', $userID)->select([
            DB::raw('start_date as `start`'),
            DB::raw('end_date as `end`'),
            DB::raw('name'),
            DB::raw('description as `desc`')
        ])->get();

        return view('eo_calendar', 
        [
            "allEvents" => $allEvents,
            'events' => $events
        ]);
    }
}
