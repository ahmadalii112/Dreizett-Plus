<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class SharedApartment extends Model
{
    protected $fillable = [
        'community_id',
        'name',
    ];

    public function residentialCommunity(): BelongsTo
    {
        return $this->belongsTo(ResidentialCommunity::class, 'community_id');
    }

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class, 'apartment_id');
    }
}
