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
        $user_id = DB::table('users')->pluck('id');
        $product_id = DB::table('products')->pluck('id');

        foreach (range(1,100) as $index) {
            DB::table('carts')->insert([
                'userId' => fake()->randomElement($user_id),
                'productId' => fake()->randomElement($product_id),
            ]);
        }
        return [
        ];
    }
}
