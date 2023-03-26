<?php

namespace App\Http\Controllers\API;

use App\Http\Filters\ProductFilter;
use App\Http\Requests\API\ProductsRequest;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\ProductResource;
use App\Models\Product;


class ProductController extends Controller
{
    /**
     * @param ProductsRequest $request
     * @return AnonymousResourceCollection
     * @throws \Illuminate\Contracts\Container\BindingResolutionException
     */
    public function index(ProductsRequest $request) : AnonymousResourceCollection
    {
        $data = $request->validated();
        $filter = app()->make(ProductFilter::class, ['queryParams' => array_filter($data)]);
        $products = Product::filter($filter)->paginate(12);
        return ProductResource::collection($products);
    }

    /**
     * @return void
     */
    public function create()
    {
        //
    }

    /**
     * @param Product $product
     * @return JsonResource
     */
    public function show(Product $product) : JsonResource
    {
        return new ProductResource($product);
    }

    /**
     * @return void
     */
    public function store()
    {
        //
    }

    /**
     * @return void
     */
    public function edit()
    {
        //
    }

    /**
     * @return void
     */
    public function update()
    {
        //
    }

    /**
     * @return void
     */
    public function destroy()
    {
        //
    }


}
