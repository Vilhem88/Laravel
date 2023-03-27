<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class CreateUsersCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:user';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creating a new user';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $user = new User();
        $users_name = User::pluck('name')->toArray();
        $user->name = $this->anticipate('What is the name of the user?', $users_name);

        $users_surname = User::pluck('surname')->toArray();
        $user->surname = $this->anticipate('What is the surname of the user?', $users_surname);
        $email = $this->ask('What is the email of the user?');
        $user_email = User::where('email', $email)->first();
        if ($user_email) {

            $this->error('User already exists');
            exit();
      
        }

        $user->email = $email;
        $user->password = Hash::make($this->secret('What is the user password?'));
        $roles = Role::pluck('name')->toArray();
        $role = $this->choice('What is the role of the user?', $roles);
        $user->role_id = Role::where('name', $role)->first()->id;
        $this->line('You entered following roles');
        $this->table(['Name', 'Surname', 'Role', 'Email'], [[$user->name, $user->surname, $role, $user->email]]);

        if ($this->confirm('Are you sure you want to save this informations in the database?')) {
            if ($user->save()) {
                $this->info('User saved successfully');
            } else {

                $this->error('Abbort');
            }
        } else {

            $this->error('Abbort');
        }
    }
}
