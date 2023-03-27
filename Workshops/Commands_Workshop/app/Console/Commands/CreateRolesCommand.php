<?php

namespace App\Console\Commands;

use App\Models\Role;
use Illuminate\Console\Command;

class CreateRolesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:role';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Saving a new role in the database!';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $role = new Role();
        $role->name = $this->ask('What is the user role?');

        if(!$role->save()){

            $this->error('Error while saving!');
        }

        $this->info('Successfully saved!');
    }
}
