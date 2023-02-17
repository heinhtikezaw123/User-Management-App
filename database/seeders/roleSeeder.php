<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Feature;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class roleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //make seeder for feature
        Role::create([
            'name' => 'admin'
        ]);
    }
}
