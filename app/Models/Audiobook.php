<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
