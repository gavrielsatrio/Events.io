<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\EventTicketCategory;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class EOEventDetailController extends Controller
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
        
        $event = Event::find($eventID);
        $eventTicketCategory = EventTicketCategory::where('event_id', $eventID)
            ->with('transactions')
            ->get();
        $ticketSales = Transaction::where('event_id', $eventID)
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

        $colors = array();
        foreach($eventTicketCategory as $item)
        {
            $randomRed = rand(100, 255);
            $randomGreen = rand(100, 255);
            $randomBlue = rand(100, 255);

            array_push($colors, "rgb($randomRed, $randomGreen, $randomBlue)");
        }

        return view('eo_event_detail', 
        [
            'event' => $event,
            'event_ticket_category' => $eventTicketCategory,
            'colors' => $colors,
            'ticket_sales' => $ticketSales
        ]);
    }
}
