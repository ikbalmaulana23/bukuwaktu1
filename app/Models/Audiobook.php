<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\ContentView;
use App\Models\ContentBadge;

class Audiobook extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'speaker_id', // Pastikan ini ada di fillable
        'cover',
        'file_path',
        'description',
    ];

    public function speaker()
    {
        return $this->belongsTo(User::class, 'speaker_id');
    }

    public function playlists()
    {
        return $this->belongsToMany(Playlist::class, 'playlist_audiobooks')
            ->withPivot('order', 'added_at')
            ->withTimestamps();
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
