<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Models\FavoriteBook;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'bio',
        'email',
        'password',
        'role',
        'profile_photo',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function socialite()
    {
        return $this->hasMany(Socialite::class);
    }

    public function posts(): HasMany
    {
        return  $this->hasMany(Post::class, 'author_id');
    }

    public function isAdmin()
    {
        return $this->role === 'admin';
    }

    public function isUser()
    {
        return $this->role === 'user';
    }

    public function followers()
    {
        return $this->belongsToMany(User::class, 'followers', 'user_id', 'follower_id');
    }

    public function following()
    {
        return $this->belongsToMany(User::class, 'followers', 'follower_id', 'user_id');
    }

    public function audiobooks()
    {
        return $this->hasMany(Audiobook::class, 'speaker_id'); // Periksa nama kolom di sini
    }

    public function interestGenres()
    {
        return $this->hasMany(InterestGenre::class);
    }
    public function favoriteAuthor()
    {
        return $this->hasMany(FavoriteAuthor::class);
    }

    public function favoriteBooks()
    {
        return $this->hasMany(FavoriteBook::class);
    }

    public function playlists()
    {
        return $this->hasMany(Playlist::class);
    }
    public function personalData()
    {
        return $this->hasOne(PersonalData::class);
    }

    public function loungePosts()
    {
        return $this->hasMany(LoungePost::class);
    }

    public function loungeComments()
    {
        return $this->hasMany(LoungeComment::class);
    }
    // Menghitung level berdasarkan jumlah postingan
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

    // Mengambil nama gelar berdasarkan level
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

    // Badge hanya muncul mulai level 3
    public function hasBadge(): bool
    {
        return true;
    }
}
