<?php

namespace Database\Factories;

use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $brandsId = DB::table('brands')->pluck('id');
        $categoriesId = DB::table('categories')->pluck('id');

        foreach (range(1,100) as $index) {
            DB::table('products')->insert([
                'name' => fake()->word(),
                'about' => fake()->text(200),
                'quantity' => fake()->numberBetween(0, 100),
                'price' => fake()->numberBetween(10, 1000),
                'photo' => fake()->imageUrl(191, 206),
                'brand_id' => fake()->randomElement($brandsId),
                'category_id' => fake()->randomElement($categoriesId),
                'created_at' => fake()->dateTime(),
            ]);
        }
        return [

        ];
    }
}
