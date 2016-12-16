<?php

use Illuminate\Database\Seeder;

class OfficeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $offices = [
            $office1 = ['name' => 'administrator'], 
            $office2 = ['name' => 'coach'],
            $office3 = ['name' => 'manager'],
            $office4 = ['name' => 'scout'],
            $office5 = ['name' => 'player']
        ];


        DB::table('offices')->insert($offices);
    }
}
