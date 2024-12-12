<?php

namespace App\Http\Controllers;

use App\Models\FavoriteAuthor;
use Illuminate\Http\Request;

class FavoriteAuthorController extends Controller
{
    public function index()
    {
        $authors = FavoriteAuthor::with('user')->get();
        return view('favorite-authors.index', compact('authors'));
    }

    public function create()
    {
        return view('favorite-authors.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'favorite_author' => 'required|string|max:255',
        ]);

        // Menambahkan author favorit untuk user yang login
        FavoriteAuthor::create([
            'user_id' => auth()->id(),
            'favorite_author' => $request->favorite_author,
        ]);

        return redirect()->route('favorite-authors.index')->with('success', 'Favorite author added successfully!');
    }

    public function edit(FavoriteAuthor $favoriteAuthor)
    {
        return view('favorite-authors.edit', compact('favoriteAuthor'));
    }

    public function update(Request $request, FavoriteAuthor $favoriteAuthor)
    {
        $request->validate([
            'favorite_author' => 'required|string|max:255',
        ]);

        $favoriteAuthor->update([
            'favorite_author' => $request->favorite_author,
        ]);

        return redirect()->route('favorite-authors.index')->with('success', 'Favorite author updated successfully!');
    }

    public function destroy(FavoriteAuthor $favoriteAuthor)
    {
        $favoriteAuthor->delete();
        return redirect()->route('favorite-authors.index')->with('success', 'Favorite author deleted successfully!');
    }
}
