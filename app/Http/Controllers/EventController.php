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
}
