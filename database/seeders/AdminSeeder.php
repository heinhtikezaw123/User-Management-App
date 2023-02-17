<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'admin',
            'user_name' => 'admin123',
            'phone' => '0934567654',
            'email' => 'admin@gmail.com',
            'gender' => 'male',
            'role_id' => '1',
            'password' => Hash::make('admin123')
        ]);
    }
}
