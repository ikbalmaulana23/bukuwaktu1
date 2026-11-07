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
}
