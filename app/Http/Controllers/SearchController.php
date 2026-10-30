<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Audiobook;
use App\Models\User;

class SearchController extends Controller
{

    public function index(Request $request)
    {
        $search = trim($request->input('q', ''));

        // Search Books
        $posts = Post::query()
            ->where('is_audited', true)
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                        ->orWhereHas('author', function ($author) use ($search) {
                            $author->where('name', 'like', "%{$search}%");
                        })
                        ->orWhereHas('category', function ($category) use ($search) {
                            $category->where('name', 'like', "%{$search}%");
                        });
                });
            })
            ->latest()
            ->paginate(12, ['*'], 'posts_page')
            ->withQueryString();

        // Search Audiobooks
        $audiobooks = Audiobook::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('title', 'like', "%{$search}%")
                        ->orWhereHas('speaker', function ($speaker) use ($search) {
                            $speaker->where('name', 'like', "%{$search}%");
                        });
                });
            })
            ->latest()
            ->paginate(12, ['*'], 'audiobooks_page')
            ->withQueryString();

        // Search Users
        $users = User::query()
            ->when($search, function ($query) use ($search) {
                $query->where(function ($q) use ($search) {
                    $q->where('name', 'like', "%{$search}%")
                        ->orWhere('username', 'like', "%{$search}%");
                });
            })
            ->latest()
            ->paginate(12, ['*'], 'users_page')
            ->withQueryString();



        return view('search.index', compact(
            'search',
            'posts',
            'audiobooks',
            'users'
        ));
    }
}
