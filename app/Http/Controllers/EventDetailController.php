<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\EventTicketCategory;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Cookie;

class EventDetailController extends Controller
{
    public function render(Request $request, $id)
    {
        // $userID = $request->cookie('user_id');
        // if($userID == null)
        // {
        //     return redirect('/');
        // }

        // $user = User::find($userID);
        // if($user == null)
        // {
        //     Cookie::queue(Cookie::forget('user_id'));
        //     return redirect('/');
        // }

        $selectedEvent = Event::where('id', $id)->with(['event_ticket_categories' => function($query) 
        {
            $query->select([
                'id',
                'event_id',
                'category',
                'capacity',
                'price',
                DB::raw('(capacity - (SELECT IFNULL(SUM(qty), 0) FROM transaction WHERE event_ticket_category.id = transaction.event_ticket_category_id AND status != "CANCEL")) as available'),
            ]);

            // $query->withCount(['transactions as registered_count'])
            //     ->select(['event_id', 'id', 'category', 'registered_count']);
            // $query->select('id', 'event','category', 'price', 'capacity');
        }])
        ->first();

        return view("event_detail", [
            'user_id' => $request->cookie('user_id'),
            'selected_event' => $selectedEvent
        ]);
    }

    public function buyTicket(Request $request)
    {
        $userID = $request->cookie('user_id');
        $eventTicketCategory = EventTicketCategory::find($request->event_ticket_category_id);
        
        if($eventTicketCategory->event->event_type_id == 1)
        {
            $transactions = Transaction::where('customer_id', $userID)
                ->where('event_id', $eventTicketCategory->event->id)
                ->where('status', '!=', 'CANCEL')
                ->sum('qty');

            if($transactions >= 2)
            {
                $selectedEvent = Event::where('id', $eventTicketCategory->event->id)->with(['event_ticket_categories' => function($query) 
                {
                    $query->select([
                        'id',
                        'event_id',
                        'category',
                        'capacity',
                        'price',
                        DB::raw('(capacity - (SELECT IFNULL(SUM(qty), 0) FROM transaction WHERE event_ticket_category.id = transaction.event_ticket_category_id AND status != "CANCEL")) as available'),
                    ]);
                }])
                ->first();

                return redirect("/event/{$eventTicketCategory->event->id}")->with([
                    'message' => 'You have reached your maximum purchase count for this event'
                ]);
            }
        }

        Transaction::create([
            'customer_id' => $userID,
            'event_id' => $eventTicketCategory->event_id,
            'event_ticket_category_id' => $eventTicketCategory->id,
            'selected_date' => $request->date,
            'purchase_date' => now('Asia/Jakarta'),
            'qty' => $request->qty,
            'total_price' => ($request->qty * $eventTicketCategory->price) + ($request->qty * $eventTicketCategory->price * 0.03),
            'status' => "UNPAID"
        ]);

        $lastTransactionID = Transaction::latest('id')->first()->id;

        return redirect("/pre-payment/$lastTransactionID");
    }
}
