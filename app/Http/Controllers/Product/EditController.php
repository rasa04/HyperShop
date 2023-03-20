<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;

class EditController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Product $product)
    {
        return view('product.edit', compact('product'));
    }
}
