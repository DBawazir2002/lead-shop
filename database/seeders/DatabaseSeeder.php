<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Admin;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call(RolesAndPermissionsSeeder::class);

       $super_admin = Admin::create([
            'name' => 'super-admin',
            'email'=> 'superadmin@gmail.com',
            'password' => Hash::make('password'),
        //    'email_verified_at' => now(),
            'level' => 'super-admin'
        ])->assignRole('super-admin');
        // $super_admin->givePermissionTo('create users');

        Admin::create([
            'name' => 'admin',
            'email'=> 'admin@gmail.com',
            'password' => Hash::make('password'),
        //    'email_verified_at' => now(),
        ])->assignRole('admin');

        User::create([
            'name' => 'user',
            'email' => 'user@gmail.com',
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'phone' => '123456789'
        ]);

    }
}
