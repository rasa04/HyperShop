<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

use MoonShine\Fields\BelongsTo;
use MoonShine\Fields\Image;
use MoonShine\Metrics\ValueMetric;
use MoonShine\QueryTags\QueryTag;
use MoonShine\Resources\Resource;
use MoonShine\Fields\Text;
use MoonShine\Fields\Number;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;
use MoonShine\Filters\TextFilter;
use MoonShine\Filters\SlideFilter;
use MoonShine\Filters\SelectFilter;
use MoonShine\Filters\BelongsToFilter;

class ProductResource extends Resource
{
	public static string $model = Product::class;

	public static string $title = 'Products';

    public static string $orderType = 'ASC';

    public static int $itemsPerPage = 5;


    public function metrics(): array
    {
        return [

        ];
    }

    public function queryTags(): array
    {
        return [
            QueryTag::make(
                'Products with filled description', // Заголовок тега
                fn() => Product::query()->whereNotNull('about') // Query builder
            ),

            QueryTag::make(
                'Products with empty description',
                fn() => Product::query()->whereNull('about')
            )->icon('users')
        ];
    }

    public function fields(): array
	{
		return [
		    ID::make()->sortable(),
            Text::make('Name', 'name')->sortable(),
            Number::make('Quantity', 'quantity')->sortable(),
            Number::make('Prices', 'price')->sortable(),
            BelongsTo::make('Categories', 'category', 'name')->sortable(),
            BelongsTo::make('Brands', 'brand', 'name')->sortable(),
            Text::make('About', 'about')
                ->hideOnIndex(),
            Image::make('Thumbnail', 'thumbnail')
                ->dir('/') // The directory where the files will be stored in storage (by default /)
                ->disk('public') // Filesystems disk
                ->allowedExtensions(['jpg', 'gif', 'png'])
                ->hideOnIndex()// Allowable extensions
        ];
	}

	public function rules(Model $item): array
	{
	    return [];
    }

    public function search(): array
    {
        return ['id', 'name'];
    }

    public function filters(): array
    {
        return [
            SlideFilter::make('Quantity', 'quantity')
                ->min(0)
                ->max(100),
            SlideFilter::make('Prices', 'price')
                ->min(0)
                ->max(100),
            BelongsToFilter::make('Categories', 'category', 'name')->nullable(),
            BelongsToFilter::make('Brands', 'brand', 'name')->nullable(),
        ];
    }

    public function actions(): array
    {
        return [
            FiltersAction::make(trans('moonshine::ui.filters')),
        ];
    }
}
