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
        $rolesToInsertOrUpdate = [
            // Create the Administration role
            ['name' => RoleTypeEnum::ADMINISTRATION->value, 'guard_name' => 'web'],
            // Create the Caregiver role
            ['name' => RoleTypeEnum::CAREGIVER->value, 'guard_name' => 'web'],
            // Create the Management role
            ['name' => RoleTypeEnum::MANAGEMENT->value, 'guard_name' => 'web'],
            // Create the Technician role
            ['name' => RoleTypeEnum::TECHNICIAN->value, 'guard_name' => 'web'],
        ];
        // Perform the upsert operation
        Role::upsert($rolesToInsertOrUpdate, ['name']);
    }
}
