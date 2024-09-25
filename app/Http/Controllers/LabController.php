<?php

namespace App\Http\Controllers;

use App\Models\LabBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LabController extends Controller
{
    public function index()
    {
        // Fetch booked labs for the authenticated user
        $bookings = LabBooking::all();
        return view('student.labs', compact('bookings')); // Use 'labs.labs' since the file is named labs.blade.php
    }


    public function bookSlot(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'lab_name' => 'required|string',
            'lab_location' => 'required|string',
            'booking_date' => 'required|date|after_or_equal:today',
            'booking_time' => 'required|string',
        ]);

        $existingBooking = LabBooking::where('lab_name', $request->lab_name)
            ->where('booking_time', $request->booking_time)
            ->first();

        if ($existingBooking) {
            return redirect()->back()->withErrors(['booking_time' => 'This lab is already booked for the selected time slot.']);
        }

        // Save the booking data to the database
        $booking = new LabBooking();
        $booking->lab_name = $request->lab_name;
        $booking->lab_location = $request->lab_location;
        $booking->booking_date = $request->booking_date;
        $booking->booking_time = $request->booking_time;
        $booking->user_id = Auth::id(); // Associate the booking with the logged-in user
        $booking->save();




        return redirect()->back()->with('success', 'Lab slot booked successfully!');
    }
    public function unbookSlot($id)
    {
        // Find the booking by ID and delete it
        $booking = LabBooking::findOrFail($id);

        // Ensure the booking belongs to the authenticated user
        if ($booking->user_id !== Auth::id()) {
            return redirect()->back()->withErrors(['unauthorized' => 'You are not authorized to unbook this slot.']);
        }

        $booking->delete();

        return redirect()->back()->with('success', 'Lab unbooked successfully!');
    }
}
