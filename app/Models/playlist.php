<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class playlist extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'name', 'description', 'is_public'];

    // Relasi ke User
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relasi ke Audiobooks melalui playlist_audiobooks
    public function audiobooks()
    {
        return $this->belongsToMany(Audiobook::class, 'playlist_audiobooks')
            ->withPivot('order', 'added_at')
            ->withTimestamps();
    }
}
