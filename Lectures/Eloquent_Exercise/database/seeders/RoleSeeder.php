<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = 'project_manager';
        $role->display_name = 'Project manager';
        $role->save();

        $role1 = new Role();
        $role1->name = 'sales';
        $role1->display_name = 'Sales';
        $role1->save();

        $role2 = new Role();
        $role2->name = 'developer';
        $role2->display_name = 'Developer';
        $role2->save();

    }
}
