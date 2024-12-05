<?php

namespace App\Http\Controllers;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('dashboard.user.index', compact('users'));
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();

        // Hash password if provided
        if (isset($data['password'])) {
            $data['password'] = Hash::make($data['password']);
        }

        // Handle image upload
        if ($request->hasFile('image')) {
            $imageName = $request->file('image')->store('user-images', 'public');
            $data['image'] = $imageName;
        }

        try {
            User::create($data);

            return redirect()->route('dashboard.user.index')->with('success', 'User created successfully!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to create the user. Please try again.');
        }
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
        $user = User::findOrFail($id);

        return view('dashboard.user.edit', compact('user'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
{
    $data = $request->validated();

    // Hash password if provided
    if (isset($data['password'])) {
        $data['password'] = Hash::make($data['password']);
    }

    // Handle image upload
    if ($request->hasFile('image')) {
        $imageName = time() . '.' . $request->image->extension();
        $request->image->move(public_path('images'), $imageName);
        $data['image'] = $imageName;
    }

    try {
        // Find the user by ID and update
        $user = User::findOrFail($id); // Ensure the user exists
        $user->update($data);

        // Redirect to user edit page with success message
        return redirect()->route('dashboard.user.edit', $id)->with('success', 'User updated successfully!');
    } catch (\Exception $e) {
        // Log the error for debugging purposes (optional)
        \Log::error('User update failed: ' . $e->getMessage());

        // Return back with error message
        return redirect()->route('users.index')->with('success', 'User updated successfully.');

    }

}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $user = User::findOrFail($id);

        try {
            $user->delete();
            return redirect()->route('dashboard.user.index')->with('success', 'User deleted successfully!');
        } catch (\Exception $e) {
            return redirect()->route('users.index')->with('error', 'Failed to delete the user. Please try again.');
        }
    }
    public function assignCoach(Request $request)
    {
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id', // Validate the user ID
        ]);

        // Find the user by ID
        $user = User::find($validated['user_id']);

        if ($user) {
            // Update the user role to 'coach'
            $user->role = 'coach';
            $user->save();

            // Insert into the coaches table
            // Assuming the 'coaches' table has a user_id column
            \App\Models\Coach::create([
                'user_id' => $user->id,
            ]);

            return redirect()->back()->with('success', 'User successfully assigned the Coach role');
        } else {
            return redirect()->back()->with('error', 'User not found');
        }
    }


}
