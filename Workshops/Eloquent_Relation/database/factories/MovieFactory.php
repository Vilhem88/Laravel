<?php

namespace Database\Factories;

use Carbon\Carbon;
use App\Models\Type;
use App\Models\Rating;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Movie>
 */
class MovieFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'title' => $this->faker->word,
            'start_date' => \Carbon\Carbon::now()->subDays(19),
            'end_date' => \Carbon\Carbon::now()->subDays(2),
            'length' => '120',
            'year' => \Carbon\Carbon::now()->subDays(rand(0, 180)),
            'description' => $this->faker->text(200),
            'type_id' => Type::inRandomOrder()->first()->id,
            'rating_id' => Rating::inRandomOrder()->first()->id
        ];
    }
}
