<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $genre1 = new Genre();
        $genre1->name = 'comedy';
        $genre1->save();
    
        $genre2 = new Genre();
        $genre2->name = 'horror';
        $genre2->save();

        $genre3 = new Genre();
        $genre3->name = 'drama';
        $genre3->save();

        $genre4 = new Genre();
        $genre4->name = 'triller';
        $genre4->save();

        $genre5 = new Genre();
        $genre5->name = 'sci-fi';
        $genre5->save();


        $genre6 = new Genre();
        $genre6->name = 'porno';
        $genre6->save();

        $genre7 = new Genre();
        $genre7->name = 'romance';
        $genre7->save();

        $genre8 = new Genre();
        $genre8->name = 'action';
        $genre8->save();
    
    }

}
