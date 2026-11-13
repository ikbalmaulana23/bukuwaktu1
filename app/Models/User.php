<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'username',
        'bio',
        'email',
        'password',
        'role',
        'profile_photo',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    // Socialite
    public function socialite(): HasMany
    {
        return $this->hasMany(Socialite::class);
    }

    // Posts yang dibuat user
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'author_id');
    }

    // Role
    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isUser(): bool
    {
        return $this->role === 'user';
    }

    // Follow system
    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    }

    public function following()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id');
    }

    // Audiobooks
    public function audiobooks(): HasMany
    {
        return $this->hasMany(Audiobook::class, 'speaker_id');
    }

    // Genre yang diminati
    public function interestGenres(): HasMany
    {
        return $this->hasMany(InterestGenre::class);
    }

    // Penulis favorit
    public function favoriteAuthor(): HasMany
    {
        return $this->hasMany(FavoriteAuthor::class);
    }

    // Bookmark
    public function bookmarks(): HasMany
    {
        return $this->hasMany(Bookmark::class);
    }

    // Playlists
    public function playlists(): HasMany
    {
        return $this->hasMany(Playlist::class);
    }

    // Data pribadi
    public function personalData()
    {
        return $this->hasOne(PersonalData::class);
    }

    // Lounge
    public function loungePosts(): HasMany
    {
        return $this->hasMany(LoungePost::class);
    }

    public function loungeComments(): HasMany
    {
        return $this->hasMany(LoungeComment::class);
    }

    // Level berdasarkan jumlah postingan
    public function getLevelAttribute(): int
    {
        $totalPosts = $this->posts_count ?? $this->posts()->count();

        return match (true) {
            $totalPosts >= 40 => 5,
            $totalPosts >= 20 => 4,
            $totalPosts >= 10 => 3,
            $totalPosts >= 5  => 2,
            default           => 1,
        };
    }

    // Nama level
    public function getLevelNameAttribute(): string
    {
        return match ($this->level) {
            5 => 'Grandmaster',
            4 => 'Sage',
            3 => 'Scholar',
            2 => 'Explorer',
            default => 'Rookie',
        };
    }

    // Badge
    public function hasBadge(): bool
    {
        return $this->level >= 3;
    }
}
