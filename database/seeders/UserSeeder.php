<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            'name' => 'G‘ARG‘ABAEVA RAMUZA',
            'username' => 'ramuza',
            'email' => 'ramuza@gmail.com',
            'password' => Hash::make('12345678'),
            'current_role' => 'admin',
            'roles_list' => json_encode(['admin', 'moder', 'student'])
        ]);
        $user->assignRole('admin');
    }
}
