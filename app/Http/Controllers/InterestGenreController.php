<?php

namespace App\Http\Controllers;

use App\Models\InterestGenre;
use Illuminate\Http\Request;

class InterestGenreController extends Controller
{
    public function index()
    {
        $genres = InterestGenre::with('user')->get();
        return view('interest-genre.index', compact('genres'));
    }

    public function create()
    {
        return view('interest-genre.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'genre' => 'required|string|max:255',
        ]);

        // Tambahkan genre untuk user yang login
        InterestGenre::create([
            'user_id' => auth()->id(),
            'genre' => $request->genre,
        ]);
        return redirect()->route('interest-genre.index')->with('success', 'Genre created successfully!');
    }

    public function edit(InterestGenre $interestGenre)
    {
        return view('interest-genre.edit', compact('interestGenre'));
    }

    public function update(Request $request, InterestGenre $interestGenre)
    {
        $request->validate([
            'genre' => 'required|string|max:255',
        ]);

        $interestGenre->update($request->all());

        return redirect()->route('profile')->with('success', 'Genre updated successfully!');
    }

    public function destroy(InterestGenre $interestGenre)
    {
        $interestGenre->delete();

        return redirect()->route('profile')->with('success', 'Genre deleted successfully!');
    }
}
