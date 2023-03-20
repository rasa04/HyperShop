<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $brands = Brand::all();
        return view('brand.index', compact('brands'));
    }
}
