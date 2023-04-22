<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Storage;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('product_images', function (Blueprint $table) {
            $table->id();
            $table->string('image_path');
            $table->unsignedInteger('product_id');

            $table->foreign('product_id')->references('id')->on('products');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        $product_images = \App\Models\ProductImage::all();
        foreach ($product_images as $product_image)
        {
            Storage::disk('public')->delete($product_image->image_path);
        }

        Schema::dropIfExists('product_images');
    }
};
