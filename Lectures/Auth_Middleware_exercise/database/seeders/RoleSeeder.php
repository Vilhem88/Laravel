<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $role = new Role();
        $role->name = 'admin';
        $role->display_name = 'Admin';
        $role->save();

        $role1 = new Role();
        $role1->name = 'guest';
        $role1->display_name = 'Guest';
        $role1->save();
    }
}
