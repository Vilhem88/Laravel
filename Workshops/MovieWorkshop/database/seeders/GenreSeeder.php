<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        
        $genre1 = new Genre();
        $genre1->name = 'Comedy';
        $genre1->save();
        
        $genre2 = new Genre();
        $genre2->name = 'Triller';
        $genre2->save();
        
        $genre3 = new Genre();
        $genre3->name = 'Action';
        $genre3->save();

        $genre4 = new Genre();
        $genre4->name = 'Sci-fi';
        $genre4->save();

        $genre5 = new Genre();
        $genre5->name = 'Drama';
        $genre5->save();

        $genre6 = new Genre();
        $genre6->name = 'True stories';
        $genre6->save();

        $genre7 = new Genre();
        $genre7->name = 'Horror';
        $genre7->save();
    }
}
