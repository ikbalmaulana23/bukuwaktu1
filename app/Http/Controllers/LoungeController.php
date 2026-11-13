<?php

namespace App\Http\Controllers;

use App\Models\LoungePost;
use App\Models\Category;
use Illuminate\Http\Request;

class LoungeController extends Controller
{

    public function index(Request $request)
    {
        $selectedCategory = Category::where(
            'slug',
            $request->query('category')
        )->first();

        $categories = Category::withCount('loungePosts')
            ->orderBy('name')
            ->get();

        $loungePosts = LoungePost::with([
            'user',
            'category',
            'comments.user'
        ])
            ->whereHas('user')
            ->when($selectedCategory, function ($query) use ($selectedCategory) {
                $query->where('category_id', $selectedCategory->id);
            })
            ->withCount('comments')
            ->latest()
            ->paginate(10)
            ->withQueryString();

        return view('lounge.index', [
            'loungePosts' => $loungePosts,
            'categories' => $categories,
            'selectedCategory' => $selectedCategory,
            'title' => 'Lounge',
        ]);
    }


    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => ['required', 'string', 'max:1000'],
            'category_id' => ['required', 'exists:categories,id'],
        ]);

        LoungePost::create([
            'user_id' => auth()->id(),
            'category_id' => $validated['category_id'],
            'content' => $validated['content'],
        ]);

        return redirect()
            ->route('lounge.index')
            ->with('pesan', 'Postingan berhasil dibuat.');
    }
}
