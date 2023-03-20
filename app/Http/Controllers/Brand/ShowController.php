<?php

namespace App\Http\Controllers\Brand;

use App\Http\Controllers\Controller;
use App\Models\Brand;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Brand $brand)
    {
        return view('brand.show', compact('brand'));
    }
}
