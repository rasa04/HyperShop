<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, Product $product)
    {
        //Validation
        $data = $request->validated();

        //Unset array of new images and save it in value
        $product_new_images = collect($data['product_images'])->reject(fn($image) => is_null($image));
        unset($data['product_images']);

        // Delete all old images
        foreach (ProductImage::where('product_id', '=', $product->id)->get() as $product_old_image)
        {
            $product_old_image->delete();
            Storage::disk('public')->delete($product_old_image->image_path);
        }

        // Update product data
        $product->update($data);

        // Create save new images
        foreach ($product_new_images as $product_image)
        {
            $image_path = Storage::disk('public')->put("images/product/$product->id/", $product_image);
            if (count($product_new_images) > 3) continue;
            ProductImage::create([
                'product_id' => $product->id,
                'image_path' => $image_path,
            ]);
        }

        $product['images'] = $product->productImages->pluck('image_path');

        return to_route('product.show', $product->id);
    }
}
