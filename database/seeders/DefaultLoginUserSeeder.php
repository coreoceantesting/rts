<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;


class DefaultLoginUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Super Admin Seeder ##
        $superAdminRole = Role::updateOrCreate(['name'=> 'Super Admin']);
        $permissions = Permission::pluck('id','id')->all();
        $superAdminRole->syncPermissions($permissions);

        $user = User::updateOrCreate([
            'email' => 'superadmin@gmail.com'
        ],[
            'name' => 'Super Admin',
            'email' => 'superadmin@gmail.com',
            'mobile' => '9999999991',
            'password' => Hash::make('12345678'),
        ]);
        $user->assignRole([$superAdminRole->id]);



        // Admin Seeder ##
        $adminRole = Role::updateOrCreate(['name'=> 'Admin']);
        $permissions = Permission::pluck('id','id')->all();
        $adminRole->syncPermissions($permissions);

        $user = User::updateOrCreate([
            'email' => 'admin@gmail.com'
        ],[
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'mobile' => '9999999992',
            'password' => Hash::make('12345678')
        ]);
        $user->assignRole([$adminRole->id]);

    }
}
