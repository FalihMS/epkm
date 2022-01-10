<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_superAdmin = Role::where('name', 'super_admin')->first();

        $employee = new User();
        $employee->name = 'super_admin';
        $employee->nim = '0000000000';
        $employee->email = 'superAdmin@example.com';
        $employee->password = bcrypt('secret');
        $employee->save();
        $employee->roles()->attach($role_superAdmin);

    }
}
