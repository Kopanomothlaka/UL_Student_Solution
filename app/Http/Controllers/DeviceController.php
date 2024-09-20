<?php

namespace App\Http\Controllers;

use App\Models\Device;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DeviceController extends Controller
{
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'deviceName' => 'required|string|max:255',
            'deviceSerial' => 'required|string|unique:devices,serial_number|max:255',
            'deviceType' => 'required|string|max:255',
            'deviceImage' => 'nullable|image|max:2048',
        ],[
        'deviceSerial.unique' => 'The device serial number is registered. ',
    ]);


        // Handle file upload
        $imagePath = null;
        if ($request->hasFile('deviceImage')) {
            $imagePath = $request->file('deviceImage')->store('device_images', 'public');
        }

        // Store the device in the database
        Device::create([
            'name' => $request->deviceName,
            'serial_number' => $request->deviceSerial,
            'type' => $request->deviceType,
            'image' => $imagePath,
            'user_id' => Auth::id()
        ]);

        return redirect()->back()->with('success', 'Device registered successfully!');
    }
}
