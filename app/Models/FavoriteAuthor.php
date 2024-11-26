<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FavoriteAuthor extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name', 'bio'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
