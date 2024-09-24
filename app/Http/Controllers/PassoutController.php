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




    public function update(Request $request, $id)
    {
        // Find the device by ID
        $device = Device::find($id);

        // Check if the device exists
        if (!$device) {
            return redirect()->back()->withErrors('Device not found.');
        }

        // Validate the request data
        $request->validate([
            'name' => 'nullable|string|max:255', // Allow name to be optional
            'serial_number' => 'nullable|string|max:255', // Allow serial_number to be optional
            'type' => 'nullable|string|max:255', // Allow type to be optional
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // optional image validation
        ]);

        // Update only the fields that are present in the request
        if ($request->has('name')) {
            $device->name = $request->input('name');
        }

        if ($request->has('serial_number')) {
            $device->serial_number = $request->input('serial_number');
        }

        if ($request->has('type')) {
            $device->type = $request->input('type');
        }

        // Set the status to a specific value
        $device->status = 'active'; // Change 'active' to whatever status you want to set

        // Handle the image upload if provided
        if ($request->hasFile('image')) {
            // Store the image and update the device's image path
            $device->image = $request->file('image')->store('device_images', 'public');
        }

        // Save changes to the device
        $device->save();

        // Redirect back with success message
        return redirect()->back()->with('success', 'Device updated successfully.');
    }


    // Method to report a device as stolen
    public function report($id)
    {
        $device = Device::find($id);

        if (!$device) {
            return redirect()->back()->withErrors('Device not found.');
        }

        // Toggle the status between 'stolen' and 'active'
        if ($device->status === 'stolen') {
            $device->status = 'active'; // Mark as found
            $message = 'Device marked as found.';
        } else {
            $device->status = 'stolen'; // Report as stolen
            $message = 'Device reported as stolen.';
        }

        $device->save();

        return redirect()->back()->with('success', $message);
    }




    // Method to delete a device
    public function destroy($id)
    {
        $device = Device::findOrFail($id);
        $device->delete();
        return redirect()->back()->with('success', 'Device deleted successfully.');
    }







}
