<?php

namespace App\Console\Commands;

use App\Models\Student;
use Illuminate\Console\Command;

class DeleteStudentsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:students';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete students created more than six months ago!';

    /**
     * Execute the console command.
     */
    public function handle(): void
    {
         Student::where('created_at', '<=', date('Y-m-d H:i:s', strtotime('-6 months')))->delete();
    }
}
