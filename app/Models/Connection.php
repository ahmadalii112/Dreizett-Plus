<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Connection extends Model
{
    protected $fillable = [
        'uuid',
        'external_id',
        'secret_identifier',
        'start_date',
        'status',
        'type',
        'bank_connection_id',
    ];

    protected $casts = [
        'start_date' => 'date:Y-m-d',
    ];
}
