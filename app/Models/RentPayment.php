<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class RentPayment extends Model
{
    protected $fillable = [
        'room_id',
        'payment_date',
        'amount',
    ];

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
