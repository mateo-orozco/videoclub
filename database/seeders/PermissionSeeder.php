<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;


class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        Permission::create(['name' => 'create movies']);
        Permission::create(['name' => 'read movies']);
        Permission::create(['name' => 'update movies']);
        Permission::create(['name' => 'destroy movies']);

        $roleAdmin = Role::create(['name'=>'admin']);
        $roleClient = Role::create(['name'=>'client']);

        $roleAdmin->givePermissionTo([
            'create movies',
            'read movies',
            'update movies',
            'destroy movies',
        ]);
        $roleClient->givePermissionTo([
            'read movies',
        ]);
    }
}
