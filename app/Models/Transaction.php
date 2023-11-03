<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Transaction extends Model
{
    protected $fillable = [
        'account_id',
        'connection_id',
        'tenant_id',
        'transaction_id',
        'transaction_date',
        'payment_partner_name',
        'reference_purpose',
        'details',
        'fin_api_account_id',
    ];

    protected $casts = [
        'transaction_date' => 'datetime',
    ];

    public function account(): BelongsTo
    {
        return $this->belongsTo(Account::class);
    }

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class)->withDefault();
    }

    public function connection(): BelongsTo
    {
        return $this->belongsTo(Connection::class)->withDefault();
    }
}
