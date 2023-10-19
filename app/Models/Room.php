<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Room extends Model
{
    protected $fillable = [
        'community_id',
        'room_number',
        'square_meter_room',
        'square_meter_common_area',
        'basic_rent',
        'additional_costs',
        'heating_costs',
        'electricity_costs',
        'created_by',
    ];

    public function residentialCommunity(): BelongsTo
    {
        return $this->belongsTo(ResidentialCommunity::class, 'community_id')->withDefault(['name' => 'N/A']);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function tenants(): HasMany
    {
        return $this->hasMany(Tenant::class);
    }

    public function rentPayments(): HasMany
    {
        return $this->hasMany(RentPayment::class);
    }

    public function automaticInvoices(): HasMany
    {
        return $this->hasMany(AutomaticInvoice::class);
    }

    /**
     * Get the Room Rent.
     */
    protected function roomRent(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->basic_rent + $this->additional_costs + $this->heating_costs + $this->electricity_costs,
        );
    }
}
