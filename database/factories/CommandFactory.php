<?php

namespace Database\Factories;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Command>
 */
class CommandFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
         // Get the author's ids from the Author table. 
         $users = DB::table('users')->pluck('id');
         $methods = ['Liquid', 'Credit Card', 'Voucher'];
         return [
             'code' => 'CO_' . now()->format('Ymd') . "N" . fake()->unique()->randomDigit(),
             'date' => fake()->dateTime(),
             'total' => fake()->randomFloat(2, 1, 200),
             'address' => fake()->address(100),
             'description' => fake()->paragraph(),
             'user_id' => fake()->randomElement($users)
         ];
    }
}
