<?php

namespace App\Http\Controllers\API;

use App\Http\Resources\BrandResource;
use App\Http\Resources\CategoryResource;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\JsonResponse;

class FilterListController
{
    public function __invoke(Product $product) : JsonResponse
    {
        $categories = CategoryResource::collection(Category::all());
        $brands = BrandResource::collection(Brand::all());

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
