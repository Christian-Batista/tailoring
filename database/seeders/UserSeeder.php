<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create a super admin
        $superAdminUser = User::firstOrCreate([
            'name' => 'Christian Batista',
            'email' => 'elcatchon@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $superAdminUser->assignRole('super-admin');

        //
        $adminUser = User::firstOrCreate([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $adminUser->assignRole('admin');

        $tailorAdmin = User::firstOrCreate([
            'name' => 'Tailor User',
            'email' => 'tailor@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $tailorAdmin->assignRole('tailor');
    }
}
