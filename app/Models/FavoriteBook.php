<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class FavoriteBook extends Model
{
    use HasFactory;

    protected $fillable = [
        'favorite_book_image',
        'favorite_book_title',
        'favorite_book_rate',
        'favorite_book_description',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
