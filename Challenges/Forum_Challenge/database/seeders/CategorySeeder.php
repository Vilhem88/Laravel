<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $category1 = new Category();
        $category1->title = 'general';
        $category1->save();

        $category2 = new Category();
        $category2->title = 'entertainment';
        $category2->save();

        
        $category3 = new Category();
        $category3->title = 'sports';
        $category3->save();

        
        $category4 = new Category();
        $category4->title = 'movies';
        $category4->save();

        
        $category5 = new Category();
        $category5->title = 'politics';
        $category5->save();

        $category6 = new Category();
        $category6->title = 'cars';
        $category6->save();
    }
}
