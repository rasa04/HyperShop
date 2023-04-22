<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

class DeleteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Product $product)
    {
        foreach (ProductImage::where('product_id', '=', $product->id)->get() as $product_image)
        {
            $product_image->delete();
            Storage::disk('public')->delete($product_image->image_path);
        }

        $product->delete();

        return redirect()->route('product.index');
    }
}
