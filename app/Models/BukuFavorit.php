<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuFavorit extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_profile',
        'judul_buku',
        'penulis',
        'rating',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_profile');
    }
}
