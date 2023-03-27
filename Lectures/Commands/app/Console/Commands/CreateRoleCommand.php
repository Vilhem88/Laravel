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
    // protected $signature = 'create:role {role? : The role name} {optionalParameter?=defaultValue} {--default : If passed a new Role 1 will be saved!}';

    protected $signature = 'create:role';


    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Save a new role in DB';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {

        // SECRET PASSWORDS ONLY

        $password = $this->secret('What is your password?');
        $this->line($password);


        $role = new Role();
        $role->name = $this->ask('What role do you want to?');

        // if ($this->option('default')) {
        //     $role->name = 'Role 1';
        // }

        // $role->name = $this->argument('role');

        // CONFIRM METHOD

        if ($this->confirm('Are you sure you want to create a new role?', true)) {

            if (!$role->save()) {
                $this->error($role->name . ' Error occurred');
            } else {
                $this->info($role->name . ' The Role was successfully created');
            }
        } else {

            $this->error('Abborted');
        }




        //ARGUMENT gi zema vrednostite samo na dadeniot argument
        // $this->line($this->argument('role'));

        //ARGUMENTS gi zema vrednostite na site argumenti
        // $this->line($this->arguments());

        // $this->line($this->option('default'));

        // $role = new Role();
        // $role->name = $this->argument('role');
        // if(!$role->save()){
        //     $this->error('This is a error message');

        // }

        // $this->info('Role saved successfully');


        // $this->line('This is a default message');
    }
}
