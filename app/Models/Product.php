<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Builder;

/**
 * @mixin Builder
 */
class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'about',
        'amount',
        'price',
        'brandId',
        'quantity',
        'photo',
    ];

    public function getRelatedBrand() : object | null
    {
        return \App\Models\Brand::where('id', '=', $this->brand_id)->first();
    }

    public function getRelatedCategory() : object | null
    {
        return \App\Models\Category::where('id', '=', $this->category_id)->first();
    }

    public function brand() : HasOne
    {
        return $this->hasOne(Brand::class, 'id', 'brandId');
    }

    public function category() : HasOne
    {
        return $this->hasOne(Category::class, 'id', 'categoryId');
    }
}
