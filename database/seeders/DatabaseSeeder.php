<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Database\Seeders\roleSeeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\FeatureSeeder;
use Database\Seeders\PermissionSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(FeatureSeeder::class);
        $this->call(PermissionSeeder::class);
        $this->call(roleSeeder::class);
        $this->call(AdminSeeder::class);
    }
}
