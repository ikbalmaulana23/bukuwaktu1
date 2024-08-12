<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FollowerController extends Controller
{
    public function follow(User $user)
    {
        auth()->user()->following()->attach($user->id);
        return back();
    }

    public function unfollow(User $user)
    {
        auth()->user()->following()->detach($user->id);
        return back();
    }

    public function follow1($id)
    {
        $user = User::findOrFail($id);
        $currentUser = auth()->user();

        if (!$currentUser->followings()->where('followed_id', $id)->exists()) {
            $currentUser->followings()->attach($user);
        }

        return redirect()->back()->with('success', 'You have followed this user.');
    }


    // public function show($id)
    // {
    //     $user = User::findOrFail($id);
    //     $followers = $user->followers; // Assuming you have defined the followers relationship

    //     return view('profile.follower', compact('user', 'followers'));
    // }
    public function show()
    {
        $user = Auth::user();
        $followers = $user->followers;

        return view('profile.follower', compact('user', 'followers'));
    }
}
