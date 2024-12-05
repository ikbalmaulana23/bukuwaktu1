<?php

namespace App\Http\Controllers;

use App\Models\playlist;
use Illuminate\Http\Request;

class playlistController extends Controller
{
    public function index()
    {
        $playlists = playlist::with('audiobooks')->get();
        return view('profile.index', compact('playlists'));
    }

    public function show(playlist $playlist)
    {
        $playlist->load('audiobooks');
        return view('playlist.show', compact('playlist'));
    }
}
