<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'about',
        'amount',
        'price',
        'brandId'
    ];

    public function brand() : HasOne
    {
        return $this->hasOne(Brand::class);
    }

    public function category() : HasOne
    {
        return $this->hasOne(Category::class);
    }
}
