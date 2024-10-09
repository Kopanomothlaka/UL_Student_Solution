<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{

    public function events()
    {
        $events = Event::all(); // Get all events
        return view('admin.events', compact('events'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start',
        ]);

        Event::create($request->all());
        return redirect()->back()->with('success', 'Event added successfully!');
    }

    public function update(Request $request, Event $event)
    {
        $request->validate([
            'title' => 'required',
            'start' => 'required|date',
            'end' => 'required|date|after_or_equal:start',
        ]);

        $event->update($request->all());
        return redirect()->back()->with('success', 'Event updated successfully!');
    }

    public function destroy(Event $event)
    {
        $event->delete();
        return redirect()->back()->with('success', 'Event delete successfully!');
    }

    public function getEvents()
    {
        return response()->json(Event::all());
    }

}
