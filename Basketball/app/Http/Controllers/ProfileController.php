<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

use Illuminate\Routing\Controller as BaseController;

class ProfileController extends BaseController
{
    /**
     * Display a listing of the resource.
     */
    public function dashboardProfile()
    {
        $user = Auth::user();

    
        return view(' include.dashboard.headerTopBar', compact('user'));
    }
    
    public function showSpecificUser()
    {
        // جلب المستخدم بالمعرف 1 (يمكنك تغييره ديناميكيًا حسب الحاجة)
        $user = Auth::user();
    
        // إذا لم يتم العثور على المستخدم
        if (!$user) {
            return redirect()->back()->with('error', 'User not found.');
        }
    
        // تمرير المستخدم إلى العرض
        return view('dashboard.profile', compact('user'));
    }
    
    

    public function viewProfile()
    {
       
    
        return view('dashboard.profile');
    }

    public function update(Request $request, User $user)
    {
        // Validate the request data
        $data = $request->validate([
            'firstName' => 'required|string|max:255',
            'midName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'phone' => 'required|string|max:15',
            'role' => 'required|string',
            'current_password' => 'nullable|string',
            'password' => 'nullable|string|min:8|confirmed', // confirmation validation for password
            'image' => 'nullable|image|mimes:jpg,png,jpeg|max:2048',
        ]);
    
        // Check the current password if a new password is provided
        if ($request->filled('password')) {
            if (!Hash::check($request->current_password, $user->password)) {
                return redirect()->back()->withErrors(['current_password' => 'The current password is incorrect.']);
            }
    
            // If the current password is correct, update the new password
            $data['password'] = bcrypt($request->password);
        }
    
        // Update the profile image if a new one is uploaded
        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('users', 'public');
            $data['image'] = $path;
        }
    
        // Update the user data
        $user->update($data);
    
        return redirect()->back()->with('success', 'User data updated successfully!');
    }
    
}
