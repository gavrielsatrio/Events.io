<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventPromo;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function render(Request $request)
    {
        $fastSellingTicketEvent = Event::where('event_type_id', '=', '1')
            ->where('end_date', '>=', now('Asia/Jakarta')->format('Y-m-d'))
            ->take(3)
            ->get();

        $promoEvent = EventPromo::join('event', 'event_promo.event_id', '=', 'event.id')
            ->where('event.end_date', '>=', now('Asia/Jakarta')->format('Y-m-d'))
            ->select([
                "event.id", 
                "event.name", 
                "event.thumbnail_path", 
                "event.gradient_cover_color"
            ])->distinct()->latest('id')->take(3)->get();

        $popularEvent = Transaction::where('event.end_date', '>=', now('Asia/Jakarta')->format('Y-m-d'))
            ->select([
                "event.id", "event.name", "event.thumbnail_path", "event.gradient_cover_color", DB::raw('COUNT(*) AS total_bought')
            ])
            ->groupBy('event_id')
            ->join('event', 'transaction.event_id', '=', 'event.id')->orderBy('total_bought', 'DESC')
            ->take(3)
            ->get();

        $recommendedEvent = Event::where('end_date', '>=', now('Asia/Jakarta')->format('Y-m-d'))
            ->latest('id')
            ->take(3)
            ->get();

        $upcomingEvent = Event::where('end_date', '>=', now('Asia/Jakarta')->format('Y-m-d'))
            ->orderBy('start_date', 'asc')
            ->get()
            ->first();

        $allEvent = Event::where('end_date', '>=', now('Asia/Jakarta')->format('Y-m-d'))->get();

        return view('home', [
            'user_id' => $request->cookie('user_id'),
            'fast_selling_ticket_event' => $fastSellingTicketEvent,
            'promo_event' => $promoEvent,
            'popular_event' => $popularEvent,
            'recommended_event' => $recommendedEvent,
            'upcoming_event' => $upcomingEvent,
            'all_event' => $allEvent
        ]);
    }
}
