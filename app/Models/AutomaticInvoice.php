<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AutomaticInvoice extends Model
{
    protected $fillable = [
        'room_id',
        'invoice_date',
        'amount',
    ];

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }
}
