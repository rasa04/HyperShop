<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use Illuminate\Http\Resources\Json\AnonymousResourceCollection;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryController extends Controller
{
    public function index() : AnonymousResourceCollection
    {
        return CategoryResource::collection(Category::all());
    }

    public function show(Category $category) : JsonResource
    {
        return new CategoryResource($category);
    }
}
