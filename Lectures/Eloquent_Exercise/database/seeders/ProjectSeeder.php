<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $project = new Project();
        $project->date_started = date('Y-m-d H:i:s', strtotime('-3 months'));
        $project->due_date = date('Y-m-d H:i:s', strtotime('-1 months'));
        $project->finished = 1;
        $project->client_id = 1;
        $project->budget = 5000;
        $project->save();
        $project->employees()->sync([1, 3, 5]);

        $project1 = new Project();
        $project1->date_started = date('Y-m-d H:i:s', strtotime('-5 months'));
        $project1->due_date = date('Y-m-d H:i:s', strtotime('-2 months'));
        $project1->finished = 0;
        $project1->client_id = 1;
        $project1->budget = 4000;
        $project1->save();
        $project1->employees()->sync([1, 2, 3, 5]);

        $project2 = new Project();
        $project2->date_started = date('Y-m-d H:i:s', strtotime('-1 months'));
        $project2->due_date = date('Y-m-d H:i:s', strtotime('+3 months'));
        $project2->finished = 0;
        $project2->client_id = 2;
        $project2->budget = 7000;
        $project2->save();
        $project2->employees()->sync([1, 2, 3, 4, 5]);


    
    
    
    
    
    }
}
