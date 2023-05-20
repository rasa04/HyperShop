<?php

namespace App\MoonShine;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use MoonShine\Dashboard\DashboardBlock;
use MoonShine\Dashboard\DashboardScreen;
use MoonShine\Metrics\ValueMetric;

class Dashboard extends DashboardScreen
{
	public function blocks(): array
	{
		return [
            DashboardBlock::make([
                ValueMetric::make('Users')
                    ->value(User::query()->count())
                    ->icon('users')
                    ->columnSpan(3),

                ValueMetric::make('Products')
                    ->value(Product::query()->count())
                    ->icon('heroicons.cube')
                    ->columnSpan(3),

                ValueMetric::make('Categories')
                    ->value(Category::query()->count())
                    ->icon('heroicons.hashtag')
                    ->columnSpan(3),

                ValueMetric::make('Brands')
                    ->value(Brand::query()->count())
                    ->icon('heroicons.heart')
                    ->columnSpan(3),
            ]),
        ];
	}
}
