<?php

namespace App\Http\Controllers;

use App\Models\Audiobook;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\ContentBadgeService;



class AudiobookController extends Controller
{
    // Menampilkan daftar audiobook
    public function index(ContentBadgeService $badgeService)
    {
        $audiobooks = Audiobook::with('speaker')
            ->latest()
            ->get();

        // Ambil data trending dan most read
        $trending = $badgeService->trending(8);
        $mostRead = $badgeService->mostRead(8);

        // Khusus audiobook
        $trendingIds = $trending
            ->where('content_type', 'audiobook')
            ->pluck('id')
            ->unique();

        $mostReadIds = $mostRead
            ->where('content_type', 'audiobook')
            ->pluck('id')
            ->unique();

        // Gabungkan ID untuk koleksi mingguan
        $weeklyIds = $trendingIds
            ->merge($mostReadIds)
            ->unique()
            ->values();

        $weeklyCollection = Audiobook::with('speaker')
            ->whereIn('id', $weeklyIds)
            ->get()
            ->sortBy(function ($audiobook) use ($weeklyIds) {
                return $weeklyIds->search($audiobook->id);
            })
            ->values();

        return view('audiobooks.index', compact(
            'audiobooks',
            'weeklyCollection',
            'trendingIds',
            'mostReadIds'
        ));
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
        $audiobook = Audiobook::with('speaker')->findOrFail($id);

        $recomendation = Audiobook::with('speaker')
            ->where('id', '!=', $audiobook->id)
            ->latest()
            ->take(8)
            ->get();

        return view('audiobooks.show', compact(
            'audiobook',
            'recomendation'
        ));
    }

    public function edit(Audiobook $audiobook)
    {
        return view('audiobooks.edit', compact('audiobook'));
    }

    public function update(Request $request, Audiobook $audiobook)
    {
        $request->validate([
            'title' => 'nullable|string|max:255',
            'file' => 'nullable|mimes:mp3,wav|max:20480',
            'cover' => 'nullable|image|max:3048',
            'description' => 'nullable|string',
        ]);

        $user = Auth::user(); // Dapatkan user yang sedang login

        // Update file audio jika ada file baru
        if ($request->hasFile('file')) {
            $filePath = $request->file('file')->store('audiobooks', 'public');
            $audiobook->file_path = $filePath;
        }

        // Update cover jika ada cover baru
        if ($request->hasFile('cover')) {
            $coverPath = $request->file('cover')->store('audiobooks/covers', 'public');
            $audiobook->cover = $coverPath;
        }

        // Update field lainnya
        $audiobook->title = $request->input('title', $audiobook->title);
        $audiobook->speaker_id = $user->id; // Set speaker_id ke ID user yang sedang login
        $audiobook->description = $request->input('description', $audiobook->description);

        $audiobook->save(); // Simpan perubahan

        return redirect()->route('audiobooks.index')->with('success', 'Audiobook berhasil diupdate!');
    }


    // Menghapus audiobook dari database
    public function destroy(Audiobook $audiobook)
    {
        $audiobook->delete();
        return redirect('/dashboard/audiobooks')->with('success', 'Audiobook berhasil dihapus!');
    }
}
