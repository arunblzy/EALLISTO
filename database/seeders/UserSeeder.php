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
        $userStatuses = config('constants.user_status');
        $userStatusActiveIndex = config('constants.user_active');
        User::create([
            'name' => 'Arun',
            'email' => 'admin@example.com',
            'username' => 'admin',
            'password' => bcrypt('admin'),
            'status' => $userStatuses[$userStatusActiveIndex],
        ]);
    }
}
