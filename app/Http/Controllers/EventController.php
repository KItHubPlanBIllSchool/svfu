<?php

namespace App\Http\Controllers;

use App\Models\RegistredUserEvents;
use App\Models\Events;
use App\Models\User;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index(Request $request)
    {
        $user = User::find($request->user_id);
        $event = Events::find($request->event_id);
        $existingRegistration = RegistredUserEvents::where('user_id', $user->id)
            ->where('event_id', $event->id)
            ->exists();

        if ($existingRegistration) {
            return redirect()->route('events')->with("error", "yje zaregan");
        }

        $registeredEvent = new RegistredUserEvents();
        $registeredEvent->user_id = $user->id;
        $registeredEvent->event_id = $event->id;
        $registeredEvent->save();

        return redirect()->route('events')->with("success", "zaregan");
    }

    public function index1(Request $request)
    {
        $events = Events::all();
        return view('events', compact('events'));
    }
    public function index2(Request $request)
{
    $request->validate([
        'pic' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        'header' => 'required',
        'description' => 'required',
        'location' => 'required', 
        'event_date_time' => 'required|date_format:Y-m-d\TH:i' // Validate the event date and time format
    ]);

    if ($request->hasFile('pic')) {
        $path = $request->file('pic')->store('images', 'public');
        
        $data = [
            'header' => $request->header,
            'description' => $request->description,
            'location' => $request->location,
            'pic' => $path,
            'datetime' => $request->event_date_time // Store the provided event date and time
        ];
        
        $event = Events::create($data);
        
        return redirect()->back()->with('success', 'Event created successfully.');
    }

    return redirect()->back()->with('error', 'Error uploading image.');
}


}
