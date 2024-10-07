<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create Security Admin
        Admin::create([
            'name' => 'Security Admin',
            'email' => 'admin@security.com',
            'password' => Hash::make('password'), // Default password
            'role' => 'security_admin',
        ]);

        // Create General Admin
        Admin::create([
            'name' => 'General Admin',
            'email' => 'admin@general.com',
            'password' => Hash::make('password'), // Default password
            'role' => 'general_admin',
        ]);
    }
}
