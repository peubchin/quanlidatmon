<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->state([
            'name' => 'Administator',
            'email' => 'admin@mail.com',
            'role' => 'admin',
        ])->create();
        User::factory()->state([
            'name' => 'Staff 01',
            'email' => 'staff01@mail.com',
            'role' => 'staff'
        ])->create();
        User::factory()->state([
            'name' => 'User 01',
            'email' => 'user01@mail.com',
            'role' => 'user'
        ])->create();
        User::factory(10)->create();
    }
}
