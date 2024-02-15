<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use App\Models\Book;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Item>
 */
class ItemFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         // Get the book's ids from the Book table. 
        $books = DB::table('books')->pluck('ISBN');
        $carts = DB::table('carts')->pluck('code');
        $commands = DB::table('commands')->pluck('code');
        $item = [
            'quantity' => fake()->numberBetween(1, 10), 
            'description' => fake()->paragraph(),
            'total' => 0.0,
            'book_id' => fake()->randomElement($books),
            'cart_id' => fake()->randomElement($carts),
            'command_id' => fake()->randomElement($commands)
        ];
        $item['total'] = Book::where("ISBN", $item['book_id'])
                ->first()->unitPrice * $item['quantity'];
        return $item;
    }
}
