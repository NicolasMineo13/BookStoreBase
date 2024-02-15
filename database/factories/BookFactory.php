<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

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
        // Get the author's ids from the Author table. 
        $authors = DB::table('authors')->pluck('id');
        $editionValidator = function($edition) {
            return ($edition >= 1 && $edition <= 20);
        };
        return [
            'ISBN' => fake()->unique()->uuid(),
            'title' => fake()->name(), 
            'year' => fake()->numberBetween(1800, 2023),
            'edition' => fake()->valid($editionValidator)->randomDigitNotNull(), 
            'editorial' => fake()->company(),
            'description' => fake()->paragraph(),
            'dimensions' => fake()->randomDigitNotNull() .' X '. fake()->randomDigitNotNull() . ' X ' . fake()->randomDigitNotNull(),
            //'quantity' => fake()->numberBetween(10,100),
            "unitPrice" => fake()->randomFloat(2, 1, 200),
            'author_id' => fake()->randomElement($authors)
        ];
    }
}

