<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Cart;
use App\Models\Command;

use Illuminate\Support\Facades\DB;

class CartSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Cart::factory()
        ->count(15)
        ->create();

        $carts = DB::table('carts')->pluck('code');
        $commands = Command::all();
        foreach($commands as $command)
        {
            $command->cart_id = fake()->unique()
                ->randomElement($carts);
            $command->save();
        }
    }
}
