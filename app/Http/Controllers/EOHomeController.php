<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class EOHomeController extends Controller
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

        $events = Event::where('event_organizer_id', $userID)->get();
        $latestEvents = Event::where('event_organizer_id', $userID)->latest('id')->take(4)->get();
        $ticketSales = Transaction::where('event.event_organizer_id', $userID)
            ->join('event', 'transaction.event_id', '=', 'event.id')
            ->select([
                DB::raw("DATE_FORMAT(transaction.purchase_date, '%M %Y') as month_year"),
                DB::raw('MONTH(transaction.purchase_date) as month'),
                DB::raw('YEAR(transaction.purchase_date) as year'),
                DB::raw('SUM(transaction.total_price) as total'),
            ])
            ->groupBy('month_year')
            ->orderBy('transaction.purchase_date', 'asc')
            ->get();

        return view('eo_home', 
        [
            'month' => [],
            'user_id' => $userID,
            'events' => $events,
            'latest_events' => $latestEvents,
            'ticket_sales' => $ticketSales
        ]);
    }
}
