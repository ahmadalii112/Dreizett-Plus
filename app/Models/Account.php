<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Account extends Model
{
    protected $fillable = [
        'connection_id',
        'account_holder_name',
        'account_id',
        'bank_name',
        'type',
        'balance',
        'currency_code',
        'iban',
        'uuid',
    ];

    public function connection(): BelongsTo
    {
        return $this->belongsTo(Connection::class, 'connection_id');
    }
}
