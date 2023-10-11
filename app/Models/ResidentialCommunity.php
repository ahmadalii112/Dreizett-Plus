<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ResidentialCommunity extends Model
{
    use HasFactory;

    protected $fillable = [
        'created_by',
        'name',
        'care_allowance',
        'household_allowance',
        'deduction_amount',
    ];

    public function sharedApartments(): HasMany
    {
        return $this->hasMany(SharedApartment::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class, 'community_id');
    }
}
