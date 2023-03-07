<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name_user' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => 2,
        ]);

        User::create([
            'name_user' => 'admin2',
            'email' => 'admin2@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => 2,
        ]);

        User::create([
            'name_user' => 'approver',
            'email' => 'approver@gmail.com',
            'password' => bcrypt('password'),
            'role_id' => 1,
        ]);
    }
}
