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
            $office1 = ['name' => 'gracz']
        ];


        DB::table('offices')->insert($offices);
    }
}
