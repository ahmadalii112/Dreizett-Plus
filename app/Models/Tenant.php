<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Tenant extends Model
{
    protected $fillable = [
        'room_id',
        'level_of_care',
        'contract_start_date',
        'contract_end_date',
        'status',
    ];

    protected $casts = ['contract_start_date' => 'date', 'contract_end_date' => 'date'];

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

    public function information(): MorphOne
    {
        return $this->morphOne(Information::class, 'informationable');
    }

    protected function contractStart(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->contract_start_date?->format('M d, Y'),
        );
    }

    protected function contractEnd(): Attribute
    {

        return Attribute::make(
            get: fn () => $this->contract_end_date?->format('M d, Y'),
        );
    }

    protected function tenantStatus(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->status ? trans_choice('language.tenants.current_status', 2) : trans_choice('language.tenants.previous_status', 2),
        );
    }
}
