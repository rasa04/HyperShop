<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use App\Http\Requests\Brand\UpdateRequest;
use App\Models\Brand;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, Brand $brand)
    {
        // если рекуест не пройдет валидацию ничего не создастся и вернет нашу же страницу
        $data = $request->validated();

        $brand->update($data);

        return to_route('brand.show', $brand->id);
    }
}
