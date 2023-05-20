<?php

namespace App\MoonShine\Resources;

use Illuminate\Database\Eloquent\Model;
use App\Models\User;

use MoonShine\Fields\Date;
use MoonShine\Fields\Number;
use MoonShine\Fields\Text;
use MoonShine\Filters\DateFilter;
use MoonShine\Filters\SelectFilter;
use MoonShine\Filters\SlideFilter;
use MoonShine\Resources\Resource;
use MoonShine\Fields\ID;
use MoonShine\Actions\FiltersAction;

class UserResource extends Resource
{
	public static string $model = User::class;

	public static string $title = 'Users';

    public static int $itemsPerPage = 10;

	public function fields(): array
	{
		return [
		    ID::make()->sortable(),
            Text::make('Name', 'display_name'),
            Text::make('Username', 'username'),
            Number::make('Age', 'age'),
            Text::make('Gender', 'gender'),
            Text::make('Email', 'email'),
            Text::make('Country', 'country'),
            Date::make('Verified', 'email_verified_at'),

        ];
	}

	public function rules(Model $item): array
	{
	    return [];
    }

    public function search(): array
    {
        return ['id'];
    }


    public function filters(): array
    {
        return [
            SlideFilter::make('Age', 'age')
                ->min(0)
                ->max(100),
            SelectFilter::make('Gender', 'gender')
                ->options([
                    2 => 'Male',
                    1 => 'Female'
                ])
                ->nullable(),
            DateFilter::make('Verified from', 'email_verified_at')->nullable(),
        ];
    }

    public function actions(): array
    {
        return [
            FiltersAction::make(trans('moonshine::ui.filters')),
        ];
    }
}
