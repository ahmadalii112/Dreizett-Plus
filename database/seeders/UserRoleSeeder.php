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
        $manager = User::updateOrCreate(
            ['email' => 'management@dreizett.com'],
            ['first_name' => 'Manager', 'username' => 'management', 'email' => 'management@dreizett.com', 'password' => Hash::make('password')]
        )->assignRole(RoleTypeEnum::MANAGEMENT->value);

        $technician = User::updateOrCreate(
            ['email' => 'technician@dreizett.com'],
            ['first_name' => 'Technician', 'username' => 'technician', 'email' => 'technician@dreizett.com', 'password' => Hash::make('password')]
        )->assignRole(RoleTypeEnum::TECHNICIAN->value);

        $caregiver = User::updateOrCreate(
            ['email' => 'caregiver@dreizett.com'],
            ['first_name' => 'Caregiver', 'username' => 'caregiver', 'email' => 'caregiver@dreizett.com', 'password' => Hash::make('password')]
        )->assignRole(RoleTypeEnum::CAREGIVER->value);
    }
}
