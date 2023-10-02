<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
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
        'house_number',
        'street',
        'zip_code',
        'city',
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

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->first_name.' '.$this->last_name,
        );
    }

    protected function address(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->house_number.', '.$this->street.', '.$this->zip_code.', '.$this->city,
        );
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
            get: fn () => $this->status ? 'Current Tenant' : 'Previous Tenant',
        );
    }
}
