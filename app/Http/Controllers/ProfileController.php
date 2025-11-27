<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    // Edit profile form
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    // Update profile picture
    public function update(Request $request)
    {
        $request->validate([
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        // Delete previous picture
        if ($user->profile_picture) {
            Storage::disk('public')->delete($user->profile_picture);
        }

        // Upload new picture
        $path = $request->file('profile_picture')->store('profile_pictures', 'public');

        $user->profile_picture = $path;
        $user->save();

        return redirect()->route('profile.edit')->with('success', 'Profile picture updated successfully!');
    }

    // Show profile page
    public function show()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    // Delete profile picture
    public function destroy()
    {
        $user = Auth::user();

        if ($user->profile_picture) {
            Storage::disk('public')->delete($user->profile_picture);
            $user->profile_picture = null;
            $user->save();
        }

        return redirect()->route('profile.edit')->with('success', 'Profile picture deleted successfully!');
    }
}
