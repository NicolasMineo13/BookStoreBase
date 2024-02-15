<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Cart>
 */
class CartFactory extends Factory
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
             'date' => fake()->dateTime(),
             'total' => fake()->randomFloat(2, 1, 200),
             'user_id' => fake()->randomElement($users)
         ];
    }
}
