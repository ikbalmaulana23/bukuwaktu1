<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\playlist;
use Illuminate\View\View;
use App\Models\FavoriteBook;
use Illuminate\Http\Request;
use App\Models\InterestGenre;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests\ProfileUpdateRequest;

class ProfileController extends Controller
{
    public function index()
    {

        $user = Auth::user();
        $interestGenres = $user->interestGenres;
        $favoriteAuthors = $user->favoriteAuthor;
        $posts = Post::where('author_id', Auth::id())->get();
        $audiobooks = $user->audiobooks; // Pastikan ini adalah koleksi atau array, bukan null
        $favoriteBooks = FavoriteBook::where('user_id', Auth::id())->get();
        $followers = $user->followers; // Relasi 'followers' akan mengembalikan daftar followers
        $following = $user->following;
        $playlists = playlist::with('audiobooks')->get();


        return view('profile.index', compact(
            'user',
            'audiobooks',
            'posts',
            'favoriteBooks',
            'followers',
            'following',
            'playlists',
            'interestGenres',
            'favoriteAuthors'
        ));
    }
    /**
     * Display the user's profile form.
     */
    public function profile(Request $request)
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

    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
