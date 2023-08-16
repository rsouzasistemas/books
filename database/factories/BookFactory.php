<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Book>
 */
class BookFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'author_id' => rand(1,100),
            'title' => fake()->name(),
            'publication_year' => rand(1988, date('Y')),
            'img_path' => asset('images/generic_book_cover.jpg'),
            'description' => fake()->text()
        ];
    }
}
