<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PostsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $post1 = new Post();
        $post1->title = 'Post 1 title';
        $post1->content = 'Post 1 content';
        $post1->save();

        $post2 = new Post();
        $post2->title = 'Post 2 title';
        $post2->content = 'Post 2 content';
        $post2->save();

        $post3 = new Post();
        $post3->title = 'Post 3 title';
        $post3->content = 'Post 3 content';
        $post3->save();
    }
}
