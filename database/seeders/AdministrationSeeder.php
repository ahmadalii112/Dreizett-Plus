<?php

namespace Database\Seeders;

use App\Enums\RoleTypeEnum;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdministrationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::updateOrCreate(['email' => 'admin@admin.com'], [
            'first_name' => 'Admin',
            'username' => 'admin',
            'email' => 'admin@admin.com',
            'password' => Hash::make('password')]);
        $user->assignRole(RoleTypeEnum::ADMINISTRATION->value);
    }
}
