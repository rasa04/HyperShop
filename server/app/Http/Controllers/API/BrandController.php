<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Controllers\Controller;
use App\Http\Resources\BrandResource;
use App\Models\Brand;

class BrandController extends Controller
{
    public function index() : AnonymousResourceCollection
    {
        return BrandResource::collection(Brand::all());
    }

    public function show(Brand $brand) : JsonResource
    {
        return new BrandResource($brand);
    }
}
