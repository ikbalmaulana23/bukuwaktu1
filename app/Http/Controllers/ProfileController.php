<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $posts = Post::where('author_id', auth()->id())->get();
        $audiobooks = $user->audiobooks; // Pastikan ini adalah koleksi atau array, bukan null

        // Debugging


        return view('profile.index', compact('user', 'audiobooks', 'posts',));
    }
    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'profile_photo' => 'nullable|image|max:2048',
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string|max:500',
        ]);

        if ($request->hasFile('profile_photo')) {
            if ($user->profile_photo) {
                Storage::delete('public/profile_photos/' . $user->profile_photo);
            }
            $fileName = $request->file('profile_photo')->store('public/profile_photos');
            $user->profile_photo = basename($fileName);
        }

        $user->name = $request->input('name');
        $user->bio = $request->input('bio');
        $user->save();

        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
