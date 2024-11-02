<?php

namespace App\Http\Controllers;

use App\Models\FavoriteBook;
use Illuminate\Http\Request;

class FavoriteBookController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'favorite_book_image' => 'required|image',
            'favorite_book_title' => 'required|string|max:255',
            'favorite_book_rate' => 'required|numeric|min:0|max:5',
            'favorite_book_description' => 'nullable|string',
        ]);

        $imagePath = $request->file('favorite_book_image')->store('favorite_book_images', 'public');

        FavoriteBook::create([
            'favorite_book_image' => $imagePath,
            'favorite_book_title' => $request->favorite_book_title,
            'favorite_book_rate' => $request->favorite_book_rate,
            'favorite_book_description' => $request->favorite_book_description,
        ]);

        return redirect()->back()->with('success', 'Favorite book added successfully.');
    }
}
