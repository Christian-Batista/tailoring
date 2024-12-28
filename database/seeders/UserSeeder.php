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
        $superAdmin = User::firstOrCreate([
            'name' => 'Christian Batista',
            'email' => 'elcatchon@gmail.com',
            'password' => bcrypt('password'),
        ]);
        $superAdmin->assignRole('super-admin');
    }
}
