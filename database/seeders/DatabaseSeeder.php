<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Role;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::updateOrCreate(
            ['email' => 'test@example.com'],
            [
            'name' => 'Test User',
            'email' => 'test@example.com',
            ]
        );

        $this->call(RolesTableSeeder::class);

        // Admin user
        $this->createAdminUser();

    }

    private function createAdminUser(): void
    {
       
        $adminRole = Role::where('name', 'admin')->first();
        $adminUser = User::where('email', 'admin@gmail.com')->first();

        if ($adminUser) {
            $adminUser->roles()->attach($adminRole);
        } else {
            $adminUser = User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('123456'),
            ]);
            $adminUser->roles()->attach($adminRole);
        }

    }

}
