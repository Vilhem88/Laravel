<?php

namespace App\Console\Commands;

use App\Models\Role;
use App\Models\Student;
use Illuminate\Console\Command;

class CreateStudentCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'create:student';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creating new student in database';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
        $students = Student::all(['name', 'email'])->toArray();
        $this->table(['Name', 'Email'], $students);
        
        
        
        $first_names = Student::pluck('name')->toArray();
        
        // $this->anticipate('Message'); autofillout

        $student = new Student();
        $student->name = $this->anticipate('What is the name of the student?', $first_names);
        $student->lastname = $this->ask('What is the lastname of the student?');
        $student->email = $this->ask('What is the email of the student?');
        $student->address = $this->ask('What is the address of the student?');
        $roles = Role::pluck('name')->toArray();
        $role = $this->choice('What is the role of the student?', $roles);
        $student->role_id = Role::where('name', $role)->first()->id;

        if ($this->confirm('Are you sure you want to save this student?', true)) {

            $student->save();
            $this->info('Student saved successfully');
        }else{
            $this->error('An error occurred');
        }
    }
}
