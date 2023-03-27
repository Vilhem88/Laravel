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
        $user = new User();
        $user->first_name = 'John';
        $user->last_name = 'Doe';
        $user->age = 30;
        $user->email = 'doe@example.com';
        $user->password = Hash::make('111222333');
        $user->role_id = Role::where('name', 'admin')->first()->id;
        $user->save();
    }
}
