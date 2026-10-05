<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\playlist;
use Illuminate\View\View;
use App\Models\FavoriteBook;
use Illuminate\Http\Request;
use App\Models\InterestGenre;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
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
        $user = $request->user();

        $user->name = $request->name;
        $user->bio = $request->bio;

        if ($request->hasFile('profile_photo')) {
            $path = $request->file('profile_photo')->store('profile_photos', 'public');

            $user->profile_photo = $path;
        }

        $user->save();

        return redirect('/profile')->with('status', 'profile-updated');
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
