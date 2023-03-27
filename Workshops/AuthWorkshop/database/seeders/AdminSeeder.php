<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;


class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $admin = new User();
        $admin->name = 'Vilhem';
        $admin->email = 'vilhem@gmail.com';
        $admin->role_id = Role::where('name', 'admin')->first()->id;
        $admin->password = Hash::make('111222333');
        $admin->save();
    }
}
