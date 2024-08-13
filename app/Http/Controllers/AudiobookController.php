<?php

namespace App\Http\Controllers;

use App\Models\Audiobook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AudiobookController extends Controller
{
    // Menampilkan daftar audiobook
    public function index()
    {
        $audiobooks = Audiobook::all();
        return view('audiobooks.index', compact('audiobooks'));
    }

    // Menampilkan formulir untuk menambah audiobook baru
    public function create()
    {
        return view('dashboard.audiobook');
    }

    // Menyimpan audiobook baru
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'file' => 'required|mimes:mp3,wav|max:20480',
            'cover' => 'nullable|image|max:2048',
            'description' => 'nullable|string',
        ]);

        $filePath = $request->file('file')->store('audiobooks', 'public');
        $coverPath = $request->hasFile('cover') ? $request->file('cover')->store('audiobooks/covers', 'public') : null;

        $user = Auth::user(); // Dapatkan user yang sedang login

        Audiobook::create([
            'title' => $request->input('title'),
            'speaker_id' => $user->id, // Simpan speaker_id
            'cover' => $coverPath,
            'file_path' => $filePath,
            'description' => $request->input('description'),
        ]);

        return redirect()->route('audiobooks.index');
    }



    // Menampilkan audiobook
    public function show($id)
    {
        $audiobook = Audiobook::findOrFail($id);
        return view('audiobooks.show', compact('audiobook'));
    }
}
