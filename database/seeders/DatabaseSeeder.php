<?php

namespace Database\Seeders;

use App\Models\Recipient;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Create admin user

        User::create([
            'name' => 'yusuf',
            'email' => 'yusuf@bansos.com',
            'role' => 'admin', // default user biasa
            'password' => Hash::make('yusufganteng'),
        ]);


    }
}
