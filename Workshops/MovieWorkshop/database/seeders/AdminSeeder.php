<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = new User();
        $user->first_name = 'Laura';
        $user->last_name = 'Leshi';
        $user->age = 32;
        $user->email = 'laura@example.com';
        $user->role_id = Role::where('name', 'admin')->first()->id;
        $user->password = Hash::make('111222333');
        $user->save();
    }
}
