<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\StoreRequest;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Support\Facades\Storage;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        // если рекуест не пройдет валидацию ничего не создастся и вернет нашу же страницу
        $data = $request->validated();
        $product_new_images = collect($data['product_images'])->reject(fn($image) => is_null($image));
        unset($data["product_images"]);

        $product = Product::firstOrCreate($data);

        foreach ($product_new_images as $image) {
            if (ProductImage::where('product_id', $product->id)->count() > 3) continue;

            $image_path = Storage::disk('public')->put("images/product/$product->id/", $image);
            ProductImage::create([
                'product_id' => $product->id,
                'image_path' => $image_path,
            ]);
        }

        return redirect()->route('product.index');
    }
}
