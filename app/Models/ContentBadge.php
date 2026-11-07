<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class ContentBadge extends Model
{
    protected $fillable = [
        'badge_type',
        'assigned_by',
        'starts_at',
        'ends_at',
    ];

    protected $casts = [
        'starts_at' => 'datetime',
        'ends_at' => 'datetime',
    ];

    public function badgeable(): MorphTo
    {
        return $this->morphTo();
    }
}
