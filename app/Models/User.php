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
}
