<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class AuthorizedRepresentative extends Model
{
    protected $fillable = [
        'tenant_id',
        'phone_number',
        'mobile_number',
        'email',
    ];

    public function tenant(): BelongsTo
    {
        return $this->belongsTo(Tenant::class);
    }

    public function information(): MorphOne
    {
        return $this->morphOne(Information::class, 'informationable');
    }
}
