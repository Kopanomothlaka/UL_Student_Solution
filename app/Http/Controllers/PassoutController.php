<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PassoutController extends Controller
{
    //
    public function index()
    {
        // Fetching all devices from the database
        $devices = Device::where('user_id', Auth::id())->orderBy('created_at', 'desc')->get();        // Passing data to the view
        return view('student.passOur', ['devices' => $devices]);
    }
    public function map()
    {
        return view('student.map'); // Create this view
    }
    // Method to show the edit form for a device


    // Method to report a device as stolen
    public function report(Request $request, $id)
    {
        $device = Device::findOrFail($id);
        $device->status = 'stolen'; // Assuming there's a status field in your devices table
        $device->save();

        return redirect()->route('devices.index')->with('success', 'Device reported as stolen.');
    }

    // Method to delete a device
    public function destroy($id)
    {
        $device = Device::findOrFail($id);
        $device->delete();
        return redirect()->back()->with('success', 'Device deleted successfully.');
    }

}
