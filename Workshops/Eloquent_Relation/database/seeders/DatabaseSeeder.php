<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(TypeSeeder::class);
        $this->call(RatingSeeder::class);
        $this->call(ActorSeeder::class);
        $this->call(DirectorSeeder::class);
        $this->call(GenreSeeder::class);
        \App\Models\Movie::factory(100)->create();
        \App\Models\Image::factory(100)->create();
       

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
