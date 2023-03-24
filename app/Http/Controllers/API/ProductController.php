<?php

namespace App\Http\Controllers\API;

use App\Http\Filters\ProductFilter;
use App\Http\Requests\API\IndexRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;

class ProductController extends Controller
{
    public function index(IndexRequest $request) : AnonymousResourceCollection
    {
        $data = $request->validated();
        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);
        $products = Product::filter($filter)->paginate(12);
        return ProductResource::collection($products);
    }
    public function show(Product $product) : JsonResource
    {
        return new ProductResource($product);
    }
}
