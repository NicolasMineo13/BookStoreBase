<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

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
            'id' => fake()->unique()->word(), 
            'name' => fake()->name(),
            'lastName' => fake()->name(), 
            'birth' => fake()->date(),
            'biography' => fake()->paragraph()
        ];
    }
}
