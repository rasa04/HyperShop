<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\UpdateRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class UpdateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, Product $product)
    {
        // если рекуест не пройдет валидацию ничего не создастся и вернет нашу же страницу
        $data = $request->validated();

        $product->update($data);

        return view('product.show', compact('product'));
    }
}
