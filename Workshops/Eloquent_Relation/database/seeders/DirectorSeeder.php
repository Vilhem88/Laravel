<?php

namespace Database\Seeders;

use App\Models\Director;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DirectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $director1 = new Director();
        $director1->name = 'Steven';
        $director1->surname = 'Hopkins';
        $director1->birth_date = \Carbon\Carbon::now()->subDays(rand(0, 5000));
        $director1->save();

        
        $director2 = new Director();
        $director2->name = 'Makr';
        $director2->surname = 'Twen';
        $director2->birth_date = \Carbon\Carbon::now()->subDays(rand(0, 5000));
        $director2->save();

        
        $director3 = new Director();
        $director3->name = 'Stuard';
        $director3->surname = 'Rimski';
        $director3->birth_date = \Carbon\Carbon::now()->subDays(rand(0, 5000));
        $director3->save();

        
        $director4 = new Director();
        $director4->name = 'Bruss';
        $director4->surname = 'Willis';
        $director4->birth_date = \Carbon\Carbon::now()->subDays(rand(0, 5000));
        $director4->save();

        
        $director5 = new Director();
        $director5->name = 'Sarah';
        $director5->surname = 'Parkier';
        $director5->birth_date = \Carbon\Carbon::now()->subDays(rand(0, 5000));
        $director5->save();

        
        $director6 = new Director();
        $director6->name = 'Samantha';
        $director6->surname = 'Kunst';
        $director6->birth_date = \Carbon\Carbon::now()->subDays(rand(0, 5000));
        $director6->save();

        
        $director7 = new Director();
        $director7->name = 'Milica';
        $director7->surname = 'Kitic';
        $director7->birth_date = \Carbon\Carbon::now()->subDays(rand(0, 5000));
        $director7->save();
    }
}
