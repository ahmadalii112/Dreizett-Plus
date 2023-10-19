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
        'deduction_amount_care_level_1',
        'deduction_amount_care_level_2',
        'deduction_amount_care_level_3',
        'deduction_amount_care_level_4',
        'deduction_amount_care_level_5',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function rooms(): HasMany
    {
        return $this->hasMany(Room::class, 'community_id');
    }
}
