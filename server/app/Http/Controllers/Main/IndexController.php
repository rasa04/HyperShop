<?php

namespace App\Http\Controllers\Main;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\User;

class IndexController extends Controller
{
    public function __invoke()
    {
        $data = [
            'users' => User::count(),
            'products' => Product::count(),
            'brands' => Brand::count(),
            'categories' => Category::count(),
        ];
        
        return view('main.index', compact('data'));
    }
}
