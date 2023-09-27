<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Tenant extends Model
{
    protected $fillable = [
        'room_id',
        'salutation',
        'first_name',
        'last_name',
        'street',
        'house_number',
        'zip_code',
        'city',
        'level_of_care',
        'contract_start_date',
        'contract_end_date',
    ];

    public function room(): BelongsTo
    {
        return $this->belongsTo(Room::class);
    }

    public function authorizedRepresentative(): HasOne
    {
        return $this->hasOne(AuthorizedRepresentative::class);
    }

    public function tenantContract(): HasOne
    {
        return $this->hasOne(TenantContract::class);
    }

    public function tenantPocketMoneyAccount(): HasOne
    {
        return $this->hasOne(TenantPocketMoneyAccount::class);
    }

    public function financialTransactions(): HasMany
    {
        return $this->hasMany(FinancialTransaction::class);
    }

    public function paymentReminders(): HasMany
    {
        return $this->hasMany(PaymentReminder::class);
    }
}