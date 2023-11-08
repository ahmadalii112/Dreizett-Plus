<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Information extends Model
{
    use HasFactory;

    protected $fillable = [
        'first_name',
        'last_name',
        'salutation',
        'house_number',
        'street',
        'zip_code',
        'city',
    ];

    public function informationable()
    {
        return $this->morphTo();
    }

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->salutation.' '.$this->first_name.' '.$this->last_name,
        );
    }

    protected function name(): Attribute
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
}
