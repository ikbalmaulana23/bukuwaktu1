<?php

namespace App\Services;

use App\Models\Post;
use App\Models\Audiobook;
use Illuminate\Support\Collection;

class ContentBadgeService
{
    public function mostRead(int $limit = 8): Collection
    {
        $posts = Post::withCount('views')
            ->get()
            ->map(function ($item) {
                $item->content_type = 'post';
                return $item;
            });

        $audiobooks = Audiobook::withCount('views')
            ->get()
            ->map(function ($item) {
                $item->content_type = 'audiobook';
                return $item;
            });

        return $posts
            ->concat($audiobooks)
            ->sortByDesc('views_count')
            ->take($limit)
            ->values();
    }

    public function trending(int $limit = 2): Collection
    {
        $posts = Post::withCount([
            'views as recent_views_count' => function ($query) {
                $query->where('viewed_at', '>=', now()->subDays(7));
            }
        ])
            ->get()
            ->map(function ($item) {
                $item->content_type = 'post';
                return $item;
            });

        $audiobooks = Audiobook::withCount([
            'views as recent_views_count' => function ($query) {
                $query->where('viewed_at', '>=', now()->subDays(7));
            }
        ])
            ->get()
            ->map(function ($item) {
                $item->content_type = 'audiobook';
                return $item;
            });

        return $posts
            ->concat($audiobooks)
            ->filter(fn($item) => $item->recent_views_count > 0)
            ->sortByDesc('recent_views_count')
            ->take($limit)
            ->values();
    }
}
