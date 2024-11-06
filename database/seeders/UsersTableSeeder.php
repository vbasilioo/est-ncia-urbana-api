<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = User::create([
            'id' => (string) Str::uuid(),
            'name' => 'Admin',
            'email' => 'vinicius.basilio@mail.com',
            'password' => Hash::make('password123'),
            'phone' => '1234567890',
            'role' => 'ADMINISTRADOR',
        ]);

        $user = User::create([
            'id' => (string) Str::uuid(),
            'name' => 'Usuário',
            'email' => 'user@example.com',
            'password' => Hash::make('password'),
            'phone' => '0987654321',
            'role' => 'USUÁRIO',
        ]);
    }
}
