<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'password' => Hash::make('password'), // use bcrypt
            'role' => 'admin',
        ]);

        User::create([
            'name' => 'zuhair',
            'email' => 'zuhair@example.com',
            'password' => Hash::make('password'), // use bcrypt
            'role' => 'customer',
        ]);
    }
}
