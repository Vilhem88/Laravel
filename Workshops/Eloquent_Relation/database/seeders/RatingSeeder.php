<?php

namespace Database\Seeders;

use App\Models\Rating;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RatingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $raiting1 = new Rating();
        $raiting1->rating_type = 'G';
        $raiting1->save();
    
        $raiting2 = new Rating();
        $raiting2->rating_type = 'PG';
        $raiting2->save();
    
        $raiting3 = new Rating();
        $raiting3->rating_type = 'PG-13';
        $raiting3->save();

        $raiting4 = new Rating();
        $raiting4->rating_type = 'R';
        $raiting4->save();
    
        $raiting5 = new Rating();
        $raiting5->rating_type = 'NC-17';
        $raiting5->save();
    
    
    
    
    }
}
