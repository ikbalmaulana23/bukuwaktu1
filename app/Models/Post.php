<?php

namespace App\Models;

use App\Models\Category;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\ContentView;
use App\Models\ContentBadge;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'slug',
        'body',
        'author_id',
        'category_id',
        'cover',
        'type',
        'is_audited'
    ];



    protected $casts = [
        'is_audited' => 'boolean', // Pastikan tipe data boolean terjaga
    ];
    protected $with = ['author', 'category'];


    public function author(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
    public function scopeFilter(Builder $query, array $filters): void
    {


        $query->when(
            $filters['search'] ?? false,
            fn($query, $search) =>
            $query->where('title', 'like', '%' . $search . '%')
        );

        $query->when(
            $filters['category'] ?? false,
            fn($query, $category) =>
            $query->whereHas('category', fn($query) => $query->where('slug', $category))
        );
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function views()
    {
        return $this->morphMany(ContentView::class, 'viewable');
    }

    public function getTotalViewsAttribute()
    {
        return $this->views()->count();
    }

    public function getUniqueReadersAttribute()
    {
        return $this->views()
            ->whereNotNull('user_id')
            ->distinct('user_id')
            ->count('user_id');
    }

    public function scopeMostRead($query)
    {
        return $query->withCount('views')
            ->orderByDesc('views_count');
    }

    public function scopeTrending($query)
    {
        return $query->withCount([
            'views as recent_views_count' => function ($query) {
                $query->where('viewed_at', '>=', now()->subDays(7));
            }
        ])->orderByDesc('recent_views_count');
    }
    public function badges()
    {
        return $this->morphMany(ContentBadge::class, 'badgeable');
    }
    public function assignEditorsChoice($adminId)
    {
        return $this->badges()->updateOrCreate(
            ['badge_type' => 'editors_choice'],
            [
                'assigned_by' => $adminId,
                'starts_at' => now(),
                'ends_at' => null,
            ]
        );
    }

    public function removeEditorsChoice()
    {
        return $this->badges()
            ->where('badge_type', 'editors_choice')
            ->delete();
    }
}
