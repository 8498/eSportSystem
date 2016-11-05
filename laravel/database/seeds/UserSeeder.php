<?php

use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $name = 'admin';
        $email = 'admin@admin.com';
        $password = 'topsecret';
        $rolename = 'superadmin';

        $role = DB::table('roles')->where('name', $rolename)->first();

        DB::table('users')->insert([
            'name' => $name,
            'email' => $email,
            'password' => bcrypt($password),
            'role_id' => $role->id,
        ]);
    }
}
