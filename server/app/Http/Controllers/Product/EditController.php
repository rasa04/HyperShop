<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;

class EditController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Product $product)
    {
        $brands = Brand::all();
        $categories = Category::all();
        $product['images'] = $product->productImages->pluck('image_path');
        return view('product.edit', compact('product', 'brands', 'categories'));
    }
}
