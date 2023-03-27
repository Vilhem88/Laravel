<?php

namespace App\Console\Commands;

use App\Models\Role;
use Illuminate\Console\Command;

class CreateRoleCommand extends Command
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
    protected $description = 'Creating a new role';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $role = new Role();
        $role->name = $this->ask('What role do you want to create?');

        if (!$role->save()) {
            $this->error('Role creation failed');
        }
        $this->info('Role created successfully');
    }
}
