<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Audiobook;
use App\Models\Category;
use App\Models\Post;
use App\Services\ContentBadgeService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;




class PostController extends Controller
{


    public function home(Request $request, ContentBadgeService $badgeService)
    {
        // 1. Ambil data badge
        $mostRead = $badgeService->mostRead(8);
        $trending = $badgeService->trending(8);

        // 2. Editor's Choice yang masih aktif
        $editorsChoice = Post::whereHas('badges', function ($query) {
            $query->where('badge_type', 'editors_choice')
                ->where(function ($q) {
                    $q->whereNull('starts_at')
                        ->orWhere('starts_at', '<=', now());
                })
                ->where(function ($q) {
                    $q->whereNull('ends_at')
                        ->orWhere('ends_at', '>=', now());
                });
        })
            ->latest()
            ->limit(8)
            ->pluck('id');

        // 3. New Arrival
        $newArrival = Post::whereHas('author', function ($query) {
            $query->has('posts', '>=', 5);
        })
            ->latest()
            ->take(1)
            ->pluck('id');

        // 4. Gabungkan ID dari keempat badge
        $weeklyIds = collect()
            ->merge($mostRead->where('content_type', 'post')->pluck('id'))
            ->merge($trending->where('content_type', 'post')->pluck('id'))
            ->merge($editorsChoice)
            ->merge($newArrival)
            ->unique()
            ->values();

        // 5. Ambil koleksi mingguan
        $weeklyCollection = Post::with(['badges', 'author', 'category'])
            ->whereIn('id', $weeklyIds)
            ->latest()
            ->get();

        // 6. Siapkan data home
        $data = [

            'audiobooks' => Audiobook::with('speaker')
                ->latest()
                ->take(4)
                ->get(),


            'posts' => Post::with(['badges', 'author', 'category'])
                ->latest()
                ->take(5)
                ->get(),

            'categories' => Cache::remember('post_categories', 3600, function () {
                return Category::orderBy('name')->get();
            }),

            'mostRead' => $mostRead,
            'trending' => $trending,
            'newArrival' => $newArrival,

            'weeklyCollection' => $weeklyCollection,

        ];

        return view('home', $data);
    }



    public function index(Request $request, ContentBadgeService $badgeService)
    {
        // 1. Ambil data badge
        $mostRead = $badgeService->mostRead(8);
        $trending = $badgeService->trending(8);

        // 2. Editor's Choice yang masih aktif
        $editorsChoice = Post::whereHas('badges', function ($query) {
            $query->where('badge_type', 'editors_choice')
                ->where(function ($q) {
                    $q->whereNull('starts_at')
                        ->orWhere('starts_at', '<=', now());
                })
                ->where(function ($q) {
                    $q->whereNull('ends_at')
                        ->orWhere('ends_at', '>=', now());
                });
        })->latest()->limit(8)->pluck('id');

        // 3. New Arrival
        $newArrival = Post::whereHas('author', function ($query) {
            $query->has('posts', '>=', 5);
        })
            ->latest()
            ->take(1)
            ->pluck('id');

        // 4. Gabungkan ID dari keempat badge
        $weeklyIds = collect()
            ->merge($mostRead->where('content_type', 'post')->pluck('id'))
            ->merge($trending->where('content_type', 'post')->pluck('id'))
            ->merge($editorsChoice)
            ->merge($newArrival)
            ->unique()
            ->values();

        // 5. Ambil semua Post yang memiliki minimal satu badge
        $weeklyCollection = Post::with(['badges', 'author', 'category'])
            ->whereIn('id', $weeklyIds)
            ->latest()
            ->get();

        // 6. Data halaman
        $data = [


            'posts' => Post::with(['badges', 'author', 'category'])
                ->filter($request->only(['search', 'category']))
                ->latest()
                ->paginate(28),

            'categories' => Cache::remember('post_categories', 3600, function () {
                return Category::orderBy('name')->get();
            }),

            'searchQuery' => $request->search,
            'selectedCategory' => $request->category,

            'mostRead' => $mostRead,
            'trending' => $trending,
            'newArrival' => $newArrival,

            'weeklyCollection' => $weeklyCollection,
        ];

        return view('posts', $data);
    }




    public function delete($id)
    {
        $post = Post::find($id);
        $post->delete();
        return redirect()->route('dashboard')->with('pesan', 'post has been deleted');
    }

    public function post(Post $post)
    {
        return view('post', ['title' => 'Single Post', 'post' => $post]);
    }
}
