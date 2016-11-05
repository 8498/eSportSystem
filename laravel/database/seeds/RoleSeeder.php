<?php

use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {   
        $roles = [
            $role1 = ['name' => 'superadmin'],
            $role2 = ['name' => 'administrator'], 
            $role3 = ['name' => 'coach'],
            $role4 = ['name' => 'manager'],
            $role5 = ['name' => 'scout'],
        ];


        DB::table('roles')->insert($roles);
    }
}
