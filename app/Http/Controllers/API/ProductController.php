<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductController extends Controller
{
    public function index() : AnonymousResourceCollection
    {
        $products = Product::orderBy('created_at')->paginate(12);
        return ProductResource::collection($products);
    }
    public function show(Product $product) : JsonResource
    {
        return new ProductResource($product);
    }
}
