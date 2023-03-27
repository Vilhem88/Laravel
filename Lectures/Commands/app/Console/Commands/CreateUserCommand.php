<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class CreateUserCommand extends Command
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
    protected $description = 'Save a new user in the database!';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $user = new User();
        $is_admin = $this->choice('Is the user admin?', ['Yes', 'No'],);
        $user->is_admin = $is_admin == 'Yes' ? true : false;
        $user->name = $this->ask('User name?');
        $user->email = $this->ask('User email?');
        
        if($user->save()){
            $this->info('User successfully created!');
        }else{
            $this->error('User creation failed');
        }

    }
}
