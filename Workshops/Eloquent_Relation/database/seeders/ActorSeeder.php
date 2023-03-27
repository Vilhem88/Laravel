<?php

namespace Database\Seeders;

use App\Models\Actor;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ActorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $actor1 = new Actor();
        $actor1->name = 'John';
        $actor1->surname = 'Doe';
        $actor1->birth_date = \Carbon\Carbon::now()->subDays(rand(0, 5000));
        $actor1->save();
    
        $actor2 = new Actor();
        $actor2->name = 'Joshua';
        $actor2->surname = 'Dikson';
        $actor2->birth_date = \Carbon\Carbon::now()->subDays(rand(0, 5000));
        $actor2->save();

        $actor3 = new Actor();
        $actor3->name = 'Valentina';
        $actor3->surname = 'Smith';
        $actor3->birth_date = \Carbon\Carbon::now()->subDays(rand(0, 5000));
        $actor3->save();

        $actor4 = new Actor();
        $actor4->name = 'Erwin';
        $actor4->surname = 'Romel';
        $actor4->birth_date = \Carbon\Carbon::now()->subDays(rand(0, 5000));
        $actor4->save();
    
        $actor5 = new Actor();
        $actor5->name = 'Nicolas';
        $actor5->surname = 'Cage';
        $actor5->birth_date = \Carbon\Carbon::now()->subDays(rand(0, 5000));
        $actor5->save();

        $actor6 = new Actor();
        $actor6->name = 'Ronald';
        $actor6->surname = 'Reagan';
        $actor6->birth_date = \Carbon\Carbon::now()->subDays(rand(0, 5000));
        $actor6->save();
    }
}
