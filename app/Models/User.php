<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use App\Enums\RoleTypeEnum;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, HasRoles, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'mobile_number',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->first_name.' '.$this->last_name,
        );
    }

    protected function IsAdministration(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->roles()->where('name', RoleTypeEnum::ADMINISTRATION->value)->exists(),
        );
    }

    protected function IsCaregiver(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->roles()->where('name', RoleTypeEnum::CAREGIVER->value)->exists(),
        );
    }

    protected function IsManagement(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->roles()->where('name', RoleTypeEnum::MANAGEMENT->value)->exists(),
        );
    }

    protected function IsTechnician(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => $this->roles()->where('name', RoleTypeEnum::TECHNICIAN->value)->exists(),
        );
    }

    protected function roleColor(): Attribute
    {
        return Attribute::make(
            get: fn () => [
                'Administration' => 'green',
                'Caregiver' => 'yellow',
                'Management' => 'indigo',
                'Technician' => 'purple',
            ][optional($this->roles->first())->name] ?? 'red'
        );
    }
}
