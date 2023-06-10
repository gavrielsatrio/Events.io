<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Event;
use App\Models\EventType;
use App\Models\EventTicketCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Cookie;

class AddEventProposalController extends Controller
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

        $eventTypes = EventType::all();

        return view('add_event_proposal', [
            'event_types' => $eventTypes
        ]);
    }

    public function request(Request $request)
    {
        $userID = $request->cookie('user_id');

        $fileThumbnail = $request->thumbnail;
        $fileBanner = $request->banner;
        $fileSupportingDocument = $request->supporting_documents;

        $eventNameLowercase = Str::lower($request->name);

        $thumbnailPath = str_replace(' ', '-', $eventNameLowercase) . '-thumbnail.' . $fileThumbnail->extension();
        $bannerPath = str_replace(' ', '-', $eventNameLowercase) . '-banner.' . $fileBanner->extension();

        $fileThumbnail->move(public_path('images'), $thumbnailPath);
        $fileBanner->move(public_path('images'), $bannerPath);
        $fileSupportingDocument->move(public_path('supporting_documents'), Str::lower($request->name) . '.' . $fileSupportingDocument->extension());

        Event::create([
            'event_organizer_id' => $userID,
            'event_type_id' => $request->event_type,
            'name' => $request->name,
            'artist' => $request->artist,
            'description' => $request->description,
            'thumbnail_path' => $thumbnailPath,
            'banner_path' => $bannerPath,
            'city_and_province' => $request->city_and_province,
            'place' => $request->place,
            'gradient_cover_color' => $request->gradient_cover_color,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'start_time' => $request->start_time,
            'end_time' => $request->end_time,
            'status' => 'ON REVIEW'
        ]);

        $latestEventID = Event::latest('id')->first()->id;

        EventTicketCategory::create([
            'event_id' => $latestEventID,
            'category' => 'Reguler',
            'price' => 200000,
            'capacity' => 10
        ]);

        return redirect('/add-event-proposal/success');
    }

    public function success(Request $request)
    {
        return view('success_event_proposal');
    }
}
