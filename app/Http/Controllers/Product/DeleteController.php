<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Product $product)
    {
        $photoPath = $product['photo'];
        Storage::disk('public')->delete($photoPath);
        $product->delete();

        return redirect()->route('product.index');
    }
}
