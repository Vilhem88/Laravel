<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Title;
use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TitleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employees = Employee::where('role_id', Role::where('name', 'developer')->first('id'))->get();
        foreach ($employees as $employee){
            $title = new Title();
            $title->employee_id = $employee->id;
            $title->title = 'Lead developer';
            $title->save(); 
        }
    }
}
