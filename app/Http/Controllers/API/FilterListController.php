<?php

namespace App\Http\Controllers\API;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

class FilterListController
{
    public function __invoke(Product $product)
    {
        $categories = Category::all();
        $brands = Brand::all();

        $maxPrice = Product::orderBy('price', 'DESC')->first()->price;
        $minPrice = Product::orderBy('price', 'ASC')->first()->price;

        $result = [
            'categories' => $categories,
            'brands' => $brands,
            'price' => [
                'max' => $maxPrice,
                'min' => $minPrice ?? 1
            ],
        ];

        return response()->json($result);
    }
}
