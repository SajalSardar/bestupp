<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder {
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run() {
        // \App\Models\User::factory(10)->create();
        User::insert([
            'name'              => 'Super Admin',
            'email'             => 'superadmin@gmail.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('password'),
            'remember_token'    => Str::random(10),
        ]);

        User::insert([
            'name'              => 'admin',
            'email'             => 'admin@gmail.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('password'),
            'remember_token'    => Str::random(10),
        ]);

        User::insert([
            'name'              => 'Teacher',
            'email'             => 'teacher@gmail.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('password'),
            'remember_token'    => Str::random(10),
        ]);

        User::insert([
            'name'              => 'Student',
            'email'             => 'student@gmail.com',
            'email_verified_at' => now(),
            'password'          => Hash::make('password'),
            'remember_token'    => Str::random(10),
        ]);

        // create permissions
        Permission::create(['name' => 'all']);
        Permission::create(['name' => 'teacher']);
        Permission::create(['name' => 'student']);

        // create roles and assign created permissions

        // this can be done as separate statements
        $role = Role::create(['name' => 'super-admin']);
        $role->givePermissionTo(Permission::all());
        $user = User::find(1);
        $user->assignRole($role);

        $role = Role::create(['name' => 'admin']);
        $role->givePermissionTo(Permission::all());
        $user = User::find(2);
        $user->assignRole($role);

        $role = Role::create(['name' => 'teacher']);
        $role->givePermissionTo('teacher');
        $user = User::find(3);
        $user->assignRole($role);

        $role = Role::create(['name' => 'student']);
        $role->givePermissionTo('student');

        $user = User::find(4);
        $user->assignRole($role);

    }
}
