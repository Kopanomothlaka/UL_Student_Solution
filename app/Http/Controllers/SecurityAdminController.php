<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Device;
use App\Models\Event;
use App\Models\LostItem;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Ensure you have necessary imports

class SecurityAdminController extends Controller
{


    public function index()
    {
        $articles = Article::latest()->take(2)->get();
        $totalEvents = Event::count();// Get the total number of events
        $totalUser = User::count();// Get the total number of events



        // Fetch the latest 5 articles
        return view('admin.security_dashboard', compact('articles','totalEvents','totalUser')); // Pass articles to the view
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


    public function getStolenDevices()
    {
        // Retrieve devices with status 'stolen' along with user information
        $stolenDevices = Device::with('user')->where('status', 'stolen')->take(2)->get();

        $totalPassOut = Device::count();// Get the total number of events
        $totalStolenDevices = Device::where('status', 'stolen')->count();
        $totalLostItems = LostItem::count();// Get the total number of events



        // Return the stolen devices to a view
        return view('admin.security_dashboard', compact('stolenDevices','totalPassOut','totalStolenDevices','totalLostItems'));
    }





}
