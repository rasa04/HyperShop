<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Products>
 */
class ProductsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $brandsId = DB::table('brands')->pluck('id');

        foreach (range(1,100) as $index) {
            DB::table('products')->insert([
                'name' => fake()->word(),
                'about' => fake()->text(100),
                'amount' => fake()->numberBetween(0, 100),
                'price' => fake()->numberBetween(1000, 1000000),
                'brandId' => fake()->randomElement($brandsId),
            ]);
        }
        return [

        ];
    }
}
