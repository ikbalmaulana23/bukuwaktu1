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
    public function updateProfilePhoto(Request $request)
    {
        $request->validate([
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        // Hapus foto profil lama jika ada
        if ($user->profile_photo) {
            Storage::delete('public/profile_photos/' . $user->profile_photo);
        }

        // Simpan foto profil baru
        $imageName = time() . '.' . $request->profile_photo->extension();
        $request->profile_photo->storeAs('public/profile_photos', $imageName);

        $user->update(['profile_photo' => $imageName]);

        return back()->with('success', 'Foto profil berhasil diperbarui.');
    }
}
