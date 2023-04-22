<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\StoreRequest;
use App\Models\Brand;

class StoreController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(StoreRequest $request)
    {
        // если рекуест не пройдет валидацию ничего не создастся и вернет нашу же страницу
        $data = $request->validated();

        Brand::firstOrCreate($data);

        return to_route('brand.index');
    }
}
