<?php

namespace Database\Factories;

use App\Models\ProductImage;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ProductImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $products_id = DB::table('products')->pluck('id');

        do $product_id = fake()->randomElement($products_id);
        while (DB::table('product_images')->where('product_id', '=', $product_id)->count() > 2);

        $image_path = "images/product/$product_id/" . fake()->numberBetween() . ".jpg";
        Storage::disk('public')->put($image_path, file_get_contents(fake()->imageUrl(191, 206)));

        return [
            'image_path' => $image_path,
            'product_id' => $product_id,
        ];
    }
}
