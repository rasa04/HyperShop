<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\cart>
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
        $userId = DB::table('users')->pluck('id');
        $productId = DB::table('products')->pluck('id');

        foreach (range(1,100) as $index) {
            DB::table('carts')->insert([
                'userId' => fake()->randomElement($userId),
                'productId' => fake()->randomElement($productId),
            ]);
        }
        return [
        ];
    }
}
