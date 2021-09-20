<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class IssuedGear extends Model
{
    use HasFactory;

    const status = [
        'DUE',
        'RETURNED',
        'OVERDUE',
        'LOST',
    ];

    /**
     * Get the gearRequest that owns the IssuedGear
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gearRequest(): BelongsTo
    {
        return $this->belongsTo(GearRequest::class);
    }
}
