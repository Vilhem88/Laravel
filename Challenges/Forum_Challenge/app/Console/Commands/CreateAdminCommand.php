<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateAdminCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:admin';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new admin command';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $user = new User();
        $users_name = User::pluck('name')->toArray();
        $user->name = $this->anticipate('What is the name of the user?', $users_name);
        $email = $this->ask('What is the email of the user?');
        $user_email = User::where('email', $email)->first();
        if ($user_email) {
            $this->error('Email already exists!');
            exit();
        }

        $user->email = $email;
        $user->password = Hash::make($this->secret('What is your password?'));
        $roles = Role::pluck('name')->toArray();
        $role = $this->choice('What is your role?', $roles);
        $user->role_id = Role::where('name', $role)->first()->id;

        $this->line('You entered following role!');
        $this->table(['Name', 'Email', 'Role'], [[$user->name, $user->email, $role]]);

        if ($this->confirm('Are you sure you want to save this role?')) {

            if ($user->save()) {
                $this->info('You have successfully saved this role!');
            } else {
                $this->error('Abbort');
            }
        } else {
            $this->error('Abbort');
        }
    }
}
