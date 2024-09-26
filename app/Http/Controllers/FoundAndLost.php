<?php

namespace App\Http\Controllers;

use App\Models\Device;
use App\Models\LostItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FoundAndLost extends Controller
{
    public function index()
{
    // Fetch all lost and found items from the database
    $items = LostItem::all();

    return view('lostItems', compact('items'));
}

    // Store new lost or found item
    public function store(Request $request)
    {
        // Validate the form input
        $validated = $request->validate([
            'item_name' => 'required|max:255',
            'item_description' => 'required',
            'location' => 'required',
            'contact_number' => 'required',
            'item_type' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Handle image upload
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('lostfound_images', 'public');
        } else {
            $imagePath = null;
        }

        // Create a new lost or found item in the database
        LostItem::create([
            'item_name' => $validated['item_name'],
            'item_description' => $validated['item_description'],
            'location' => $validated['location'],
            'contact_number' => $validated['contact_number'],
            'item_type' => $validated['item_type'],
            'image' => $imagePath,
        ]);

        // Redirect back with success message
        return redirect()->route('lostItems')->with('success', 'Item added successfully.');
    }
}
