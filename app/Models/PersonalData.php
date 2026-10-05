<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class PersonalData extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'full_name',
        'genre',
        'birth_date',
        'gender',
        'city',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
