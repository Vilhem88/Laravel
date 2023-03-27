<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\Employee;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $employee = new Employee();
        $employee->first_name = 'John';
        $employee->last_name = 'Doe';
        $employee->date_started_work = date('Y-m-d H:i:s', strtotime('-5 years'));
        $employee->salary = 2000;
        $employee->role_id = Role::where('name', 'developer')->first()->id;
        $employee->save();

        $employee1 = new Employee();
        $employee1->first_name = 'Jane';
        $employee1->last_name = 'Doe';
        $employee1->date_started_work = date('Y-m-d H:i:s', strtotime('-3 years'));
        $employee1->salary = 1500;
        $employee1->role_id = Role::where('name', 'developer')->first()->id;
        $employee1->save();

        $employee2 = new Employee();
        $employee2->first_name = 'Sarah';
        $employee2->last_name = 'Smith';
        $employee2->date_started_work = date('Y-m-d H:i:s', strtotime('-1 years'));
        $employee2->salary = 800;
        $employee2->role_id = Role::where('name', 'sales')->first()->id;
        $employee2->save();

        $employee3 = new Employee();
        $employee3->first_name = 'Jane';
        $employee3->last_name = 'Smith';
        $employee3->date_started_work = date('Y-m-d H:i:s', strtotime('-3 years'));
        $employee3->salary = 1000;
        $employee3->role_id = Role::where('name', 'sales')->first()->id;
        $employee3->save();
        
        $employee4 = new Employee();
        $employee4->first_name = 'John1';
        $employee4->last_name = 'Doe1';
        $employee4->date_started_work = date('Y-m-d H:i:s', strtotime('-7 years'));
        $employee4->salary = 3000;
        $employee4->role_id = Role::where('name', 'project_manager')->first()->id;
        $employee4->save();

    
    }
}
