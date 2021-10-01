<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class GearRequest extends Model
{
    use HasFactory;

    protected $fillable =[
        'status'
    ];

    const status =[
        'PENDING',
        'APPROVED',
        'DENIED'
    ];

    /**
     * Get the user that owns the GearRequest
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the gear that owns the GearRequest
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function gear(): BelongsTo
    {
        return $this->belongsTo(Gear::class);
    }
}
