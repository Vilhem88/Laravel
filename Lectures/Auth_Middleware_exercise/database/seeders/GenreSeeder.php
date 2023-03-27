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
        $genre1->name = 'Action';
        $genre1->save();
        
        $genre2 = new Genre();
        $genre2->name = 'Drama';
        $genre2->save();

        
        $genre3 = new Genre();
        $genre3->name = 'Sci-fi';
        $genre3->save();
    }
}
