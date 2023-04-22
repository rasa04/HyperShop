<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Product $product)
    {
        $product['images'] = $product->productImages->pluck('image_path');
        return view('product.show', compact('product'));
    }
}
