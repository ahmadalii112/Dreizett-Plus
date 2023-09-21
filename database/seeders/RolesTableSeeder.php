<?php

namespace Database\Seeders;

use App\Enums\RoleTypeEnum;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create the Administration role
        Role::create(['name' => RoleTypeEnum::ADMINISTRATION->value]);

        // Create the Caregiver role
        Role::create(['name' => RoleTypeEnum::CAREGIVER->value]);

        // Create the Management role
        Role::create(['name' => RoleTypeEnum::MANAGEMENT->value]);

        // Create the Technician role
        Role::create(['name' => RoleTypeEnum::TECHNICIAN->value]);

    }
}
