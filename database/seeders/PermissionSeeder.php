<?php

namespace Database\Seeders;

use App\Models\Feature;
use App\Models\Permission;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //make seeder for permission
        Permission::create([
            'name' => 'view',
            'feature_id' => '1'
        ]);

        Permission::create([
            'name' => 'create',
            'feature_id' => '1'
        ]);

        Permission::create([
            'name' => 'update',
            'feature_id' => '1'
        ]);

        Permission::create([
            'name' => 'delete',
            'feature_id' => '1'
        ]);

        Permission::create([
            'name' => 'view',
            'feature_id' => '2'
        ]);

        Permission::create([
            'name' => 'create',
            'feature_id' => '2'
        ]);

        Permission::create([
            'name' => 'update',
            'feature_id' => '2'
        ]);

        Permission::create([
            'name' => 'delete',
            'feature_id' => '2'
        ]);
    }
}
