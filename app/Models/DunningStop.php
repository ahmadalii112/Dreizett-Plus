<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DunningStop extends Model
{
    protected $fillable = [
        'tenant_id',
        'stop_until_date',
    ];
}
