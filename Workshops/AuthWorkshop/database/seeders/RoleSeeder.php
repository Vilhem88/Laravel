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
        $role1 = new Role();
        $role1->name = 'admin';
        $role1->save();
        
        $role2 = new Role();
        $role2->name = 'editor';
        $role2->save();
    
        $role3 = new Role();
        $role3->name = 'user';
        $role3->save();
    }
}
