<?php

namespace App\Http\Controllers;

use App\Models\Activity;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SessionController extends Controller
{
    public function index()
    {
        $sessions = Session::with('activity')->get();
        $activities = Activity::all();
        return view('dashboard.session.index', compact('sessions','activities'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $request->validate([
            'name' => 'required|string|max:255',
            'name_ar' => 'required|string|max:255',
            'date' => 'required|date',
            'time' => 'required|date_format:H:i',
            'duration' => 'required|integer|min:1',
            'capacity' => 'required|integer|min:1',
            'activity_id' => 'required|exists:activities,id', // Assumes activities table is present
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Optional image validation
        ]);

        // Handle image upload (optional)
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('session_images', 'public');
        }

        // Create the session entry
        $session = Session::create([
            'name' => $request->name,
            'name_ar' => $request->name_ar,
            'date' => $request->date,
            'time' => $request->time,
            'duration' => $request->duration,
            'capacity' => $request->capacity,
            'activity_id' => $request->activity_id,
            'description' => $request->description,
            'image' => $imagePath, // Save image path
        ]);

        // Return response or redirect
        return redirect()->route('sessions.index')->with('success', 'Session added successfully!');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
