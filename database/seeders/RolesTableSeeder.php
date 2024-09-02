<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Role::create(['name' => 'user', 'description' => 'User role']);
        Role::create(['name' => 'admin', 'description' => 'Admin role']);
        Role::create(['name' => 'manager', 'description' => 'Manager role']);
    }
}
