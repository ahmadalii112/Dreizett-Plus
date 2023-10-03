<?php

namespace Database\Seeders;

use App\Enums\RoleTypeEnum;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $manager = User::create(['first_name' => 'Manager', 'email' => 'management@dreizett.com', 'password' => Hash::make('password')])
            ->assignRole(RoleTypeEnum::MANAGEMENT->value);
        $technician = User::create(['first_name' => 'Technician', 'email' => 'technician@dreizett.com', 'password' => Hash::make('password')])
            ->assignRole(RoleTypeEnum::TECHNICIAN->value);
        $caregiver = User::create(['first_name' => 'Caregiver', 'email' => 'caregiver@dreizett.com', 'password' => Hash::make('password')])
            ->assignRole(RoleTypeEnum::CAREGIVER->value);
    }
}