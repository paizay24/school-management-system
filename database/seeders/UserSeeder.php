<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
      User::factory(10)->create();

      User::factory()->create([
        'name' => 'admin',
        'email' => 'admin@gmail.com',
        'role' => 'admin',
        'email_verified_at' => now(),
        'password' => Hash::make('pzo123123'),
        'remember_token' => Str::random(10),
    ]);
    User::factory()->create([
        'name' => 'teacher',
        'email' => 'teacher@gmail.com',
        'role' => 'teacher',
        'email_verified_at' => now(),
        'password' => Hash::make('pzo123123'),
        'remember_token' => Str::random(10),
    ]);
    User::factory()->create([
        'name' => 'student',
        'email' => 'student@gmail.com',
        'role' => 'student',
        'email_verified_at' => now(),
        'password' => Hash::make('pzo123123'),
        'remember_token' => Str::random(10),
    ]);
    }
}
