<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Author>
 */
class AuthorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail(),
            'zip_code' => fake()->numerify('########'),
            'address' => fake()->streetAddress(),
            'address_number' => rand(1,99999),
            'district' => fake()->locale(),
            'city' => fake()->locale(),
            'federative_unity' => fake()->lexify('??')
        ];
    }
}
