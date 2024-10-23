<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserProfileController extends Controller
{
    //////////////////////////////////////////////////////////////////

    public function show()
    {
        return view('user.profile');
    }

    //////////////////////////////////////////////////////////////////

    public function update(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'second_name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . auth()->id(),
            'phone' => 'required|string|max:20',
            'address' => 'required|string',
            'city' => 'required|string',
            'state' => 'required|string',
            'zip_code' => 'required|string',
            'country' => 'required|string',
            'profile_picture' => 'nullable|image|max:2048'
        ]);

        $user = auth()->user();

        if ($request->hasFile('profile_picture')) {
            $path = $request->file('profile_picture')->store('profile-pictures', 'public');
            $validated['profile_picture'] = $path;
        }

        $user->update($validated);

        return redirect()->route('profile')->with('success', 'Profile updated successfully');
    }

    //////////////////////////////////////////////////////////////////
}