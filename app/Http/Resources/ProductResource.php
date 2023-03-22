<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'about' => $this->about,
            'quantity' => $this->quantity,
            'price' => $this->price,
            'product_images' => ProductImageResource::collection($this->productImages),
            'brand' => new BrandResource($this->brand),
            'category' => new CategoryResource($this->category),
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ];
    }
}
