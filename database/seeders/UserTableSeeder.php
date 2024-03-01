<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //create data user
        user::create([           //tambah ini
            'name'     => 'Administrator',
            'email'    => 'admin@gmail.com',
            'password' => bcrypt('password' )
        ]);
        
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@role.test',
            'password' => bcrypt('12345678'),
            'nisn' => '0025789677'
        ]);

        $admin->assignRole('admin');

        $role = Role::whereName('admin')->first();
        $permission = Permission::all();

        $role->syncPermissions($permission);
        
        $user = User::find(1);
        $user->assignRole($role->name);
    }
}
