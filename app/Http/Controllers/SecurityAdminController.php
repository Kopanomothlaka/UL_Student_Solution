<?php

namespace App\Http\Controllers;

use App\Mail\NotifyUser;
use App\Models\Article;
use App\Models\Device;
use App\Models\Event;
use App\Models\LostItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

// Ensure you have necessary imports

class SecurityAdminController extends Controller
{


    public function index()
    {
        $articles = Article::latest()->take(2)->get();
        $totalEvents = Event::count(); // Get the total number of events
        $totalUser = User::count(); // Get the total number of users

        // Retrieve devices with status 'stolen' along with user information
        $stolenDevices = Device::with('user')->where('status', 'stolen')->get();
        $totalPassOut = Device::count(); // Get the total number of devices
        $totalStolenDevices = Device::where('status', 'stolen')->count();
        $totalLostItems = LostItem::count(); // Get the total number of lost items

        // Pass all the necessary data to the view
        return view('admin.security_dashboard', compact(
            'articles',
            'totalEvents',
            'totalUser',
            'stolenDevices',
            'totalPassOut',
            'totalStolenDevices',
            'totalLostItems'
        ));
    }


    public function events()
    {
        return view('admin.events'); // Pass articles to the view
    }




    // Logout the admin user
    public function logout(Request $request)
    {
        Auth::guard('admin')->logout(); // Log the admin out
        $request->session()->invalidate(); // Invalidate the session
        $request->session()->regenerateToken(); // Regenerate CSRF token

        return redirect('login'); // Redirect to the admin login page
    }





    public function markAsFound($id)
    {
        $device = Device::findOrFail($id);
        $device->status = 'found'; // Update the status to 'found'
        $device->save(); // Save the changes

        return redirect()->back()->with('message', 'Device marked as found successfully!');
    }

    public function notifyLocation(Request $request, $id)
    {
        $request->validate([
            'location' => 'required|string|max:255',
        ]);

        $device = Device::findOrFail($id);
        $device->status = 'found'; // Change status to found
        $device->location = $request->input('location'); // Save the location
        $device->save(); // Save changes

        return redirect()->back()->with('message', 'Device marked as found: Collect at ' . $device->location);
    }

    public function activateDevice($id)
    {
        // Find the device by ID
        $device = Device::findOrFail($id);

        // Change the status to active
        $device->status = 'active'; // Update status to active
        $device->save(); // Save changes

        return redirect()->back()->with('message', 'Device marked as active!');
    }

    public function lostAndFound()
    {
        // Fetch all lost items with the associated user
        $lostItems = LostItem::with('user')->latest()->get([
            'id', 'item_name', 'item_description', 'location', 'contact_number', 'item_type', 'image', 'user_id'
        ]);

        // Return the view with lost items
        return view('admin.lost_and_found', compact('lostItems'));
    }

    public function tifyLocation(Request $request, $id)
    {
        // Validate the request
        $request->validate([
            'location' => 'required|string|max:255',
        ]);

        // Find the lost item and its associated user
        $item = LostItem::with('user')->findOrFail($id);

        // Update the location
        $item->location = $request->input('location');
        $item->save(); // Save the changes

        // Notify the user via email
        if ($item->user) {
            Mail::to($item->user->email)->send(new NotifyUser($item));
        }

        return redirect()->back()->with('message', 'User notified about the collection location!');
    }


    //profile
    public function profile()
    {
        // You can fetch additional data here if needed
        $admin = Auth::guard('admin')->user(); // Get the currently authenticated admin

        return view('admin.profile', compact('admin')); // Return the profile view with admin data
    }

    public function changePassword(Request $request)
    {
        // Validate the request
        $request->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        $admin = Auth::guard('admin')->user();

        // Check if the current password is correct
        if (!Hash::check($request->current_password, $admin->password)) {
            return redirect()->back()->withErrors(['current_password' => 'Current password is incorrect.']);
        }

        // Update the password
        $admin->password = Hash::make($request->new_password);
        $admin->save();

        return redirect()->back()->with('message', 'Password updated successfully!');
    }








}
