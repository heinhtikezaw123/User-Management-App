<?php

namespace Database\Seeders;

use App\Models\Feature;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FeatureSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //make seeder for feature
        Feature::create([
            'name' => 'user'
        ]);

        Feature::create([
            'name' => 'role'
        ]);
    }
}
