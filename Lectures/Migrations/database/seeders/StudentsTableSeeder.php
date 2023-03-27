<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class StudentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('students')->insert([
            [
                'name' => 'John',
                'index_num'  => '123456',
                'role_id'  => '1',
                

            ],
            [
                'name' => 'Hanna',
                'index_num'  => '0034512',
                'role_id'  => '2',
               

            ]


        ]);
    }
}
