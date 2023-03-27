<?php

namespace Database\Seeders;

use App\Models\Bonus;
use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class BonusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employee = Employee::find(1);
        $bonus = new Bonus();
        $bonus->employee_id = 1;
        $bonus->bonus =  500;
        $bonus->save();
    }
}
