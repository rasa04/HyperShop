<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;

class ProductFilter extends AbstractFilter
{
    const NAME = 'name';
    const ID = 'id';
    const ABOUT = 'about';
    const PRICES = 'prices';
    const BRANDS = 'brands';
    const CATEGORIES = 'categories';

    protected function getCallbacks(): array
    {
        return [
            self::NAME => [$this, 'name'],
            self::ID => [$this, 'id'],
            self::ABOUT => [$this, 'about'],
            self::PRICES => [$this, 'price'],
            self::BRANDS => [$this, 'brands'],
            self::CATEGORIES => [$this, 'categories'],
        ];
    }
    protected function id(Builder $builder, $ids)
    {
        $builder->whereIn('id', $ids);  
    }
    protected function name(Builder $builder, $value)
    {
        // $builder->whereIn('name', $value);
    }

    protected function about(Builder $builder, $value)
    {
        $builder->whereIn('about', $value);
    }

    protected function price(Builder $builder, $prices)
    {
        $builder->whereBetween('price', $prices);
    }

    protected function brands(Builder $builder, $value)
    {
        $builder->whereIn('brand_id', $value);
    }

    protected function categories(Builder $builder, $value)
    {
        $builder->whereIn('category_id', $value);
    }
}
