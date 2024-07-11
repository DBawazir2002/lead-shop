<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // create permissions

         Permission::create(['guard_name' => 'admin', 'name' => 'edit categories']);
         Permission::create(['guard_name' => 'admin', 'name' => 'create categories']);
         Permission::create(['guard_name' => 'admin', 'name' => 'delete categories']);

         Permission::create(['guard_name' => 'admin', 'name' => 'edit products']);
         Permission::create(['guard_name' => 'admin', 'name' => 'create products']);
         Permission::create(['guard_name' => 'admin', 'name' => 'delete products']);

         Permission::create(['guard_name' => 'admin', 'name' => 'edit collections']);
         Permission::create(['guard_name' => 'admin', 'name' => 'create collections']);
         Permission::create(['guard_name' => 'admin', 'name' => 'delete collections']);

         Permission::create(['guard_name' => 'admin', 'name' => 'edit coupons']);
         Permission::create(['guard_name' => 'admin', 'name' => 'create coupons']);
         Permission::create(['guard_name' => 'admin', 'name' => 'delete coupons']);

         Permission::create(['guard_name' => 'admin', 'name' => 'edit payments']);
         Permission::create(['guard_name' => 'admin', 'name' => 'create payments']);
         Permission::create(['guard_name' => 'admin', 'name' => 'delete payments']);

         Permission::create(['guard_name' => 'admin', 'name' => 'edit shipping']);
         Permission::create(['guard_name' => 'admin', 'name' => 'create shipping']);
         Permission::create(['guard_name' => 'admin', 'name' => 'delete shipping']);

         Permission::create(['guard_name' => 'admin', 'name' => 'edit shipping_providers']);
         Permission::create(['guard_name' => 'admin', 'name' => 'create shipping_providers']);
         Permission::create(['guard_name' => 'admin', 'name' => 'delete shipping_providers']);

         Permission::create(['guard_name' => 'admin', 'name' => 'edit shipping_methods']);
         Permission::create(['guard_name' => 'admin', 'name' => 'create shipping_methods']);
         Permission::create(['guard_name' => 'admin', 'name' => 'delete shipping_methods']);

         Permission::create(['guard_name' => 'admin', 'name' => 'edit users']);
         Permission::create(['guard_name' => 'admin', 'name' => 'delete users']);
         Permission::create(['guard_name' => 'admin', 'name' => 'create users']);

         Permission::create(['guard_name' => 'admin', 'name' => 'edit offers']);
         Permission::create(['guard_name' => 'admin', 'name' => 'delete offers']);
         Permission::create(['guard_name' => 'admin', 'name' => 'create offers']);

         Permission::create(['guard_name' => 'admin', 'name' => 'edit orders']);
         Permission::create(['guard_name' => 'admin', 'name' => 'delete orders']);
         Permission::create(['guard_name' => 'admin', 'name' => 'create orders']);

         Permission::create(['guard_name' => 'admin', 'name' => 'edit addresses']);
         Permission::create(['guard_name' => 'admin', 'name' => 'delete addresses']);
         Permission::create(['guard_name' => 'admin', 'name' => 'create addresses']);

         Permission::create(['guard_name' => 'admin', 'name' => 'edit admins']);
         Permission::create(['guard_name' => 'admin', 'name' => 'delete admins']);
         Permission::create(['guard_name' => 'admin', 'name' => 'create admins']);

         Permission::create(['guard_name' => 'admin', 'name' => 'edit countries']);
         Permission::create(['guard_name' => 'admin', 'name' => 'delete countries']);
         Permission::create(['guard_name' => 'admin', 'name' => 'create countries']);

         Permission::create(['guard_name' => 'admin', 'name' => 'edit cities']);
         Permission::create(['guard_name' => 'admin', 'name' => 'delete cities']);
         Permission::create(['guard_name' => 'admin', 'name' => 'create cities']);


         $admin = Role::create(['guard_name' => 'admin','name' => 'admin']);
         $admin->givePermissionTo([
            'create categories',
            'edit categories',
            'delete categories',
            'create orders',
            'edit orders',
            'create offers',
            'edit offers',
            'delete offers',
            'create users',
            'edit users',
            'delete users',
            'create collections',
            'edit collections',
            'delete collections',
            'create products',
            'edit products',
            'delete products',
            'edit countries',
            'create countries',
            'delete countries',
            'edit cities',
            'create cities',
            'delete cities',
        ]);

        //  $role->givePermissionTo([
        //     'create categories',
        //     'edit categories',
        //     'delete categories',
        //     'create addresses',
        //     'edit addresses',
        //     'delete addresses',
        //     'create orders',
        //     'edit orders',
        //     'delete orders',
        //     'create offers',
        //     'edit offers',
        //     'delete offers',
        //     'create users',
        //     'edit users',
        //     'delete users',
        //     'create shipping_methods',
        //     'edit shipping_methods',
        //     'delete shipping_methods',
        //     'create shipping_providers',
        //     'edit shipping_providers',
        //     'delete shipping_providers',
        //     'create shipping',
        //     'edit shipping',
        //     'delete shipping',
        //     'create payments',
        //     'edit payments',
        //     'delete payments',
        //     'create coupons',
        //     'edit coupons',
        //     'delete coupons',
        //     'create collections',
        //     'edit collections',
        //     'delete collections',
        //     'create products',
        //     'edit products',
        //     'delete products',
        // ]);


        //  $role = Role::create(['name' => 'customer']);
        // $role->givePermissionTo([
        //     'create places',
        //     'edit places',
        //     'delete places',
        //     'create offers',
        //     'edit offers',
        //     'delete offers',
        // ]);

          $role = Role::create(['guard_name' => 'admin','name' => 'super-admin']);
          $role->givePermissionTo(Permission::all());
    }
}
