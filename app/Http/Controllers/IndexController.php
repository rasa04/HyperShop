<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Products;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class IndexController extends Controller
{
    public function main() : \stdClass
    {
        $brands = Brand::all();
        $categories = Category::all();
        $products = Products::where('price', '>', 10)->take(6)->get();

        $data = [
            'brands' => $brands,
            'categories' => $categories,
            'products' => $products
        ];

        return response()->json($data)->getData();
    }

    public function checkout() : object
    {
        return view('checkout');
    }

    public function cart() : object
    {
        return view('cart');
    }

    public function contact() : object
    {
        return view('contact');
    }

    public function categories() : Response
    {
        $categories = Category::all()->toJson();

        return response($categories);
    }
    public function brands() : Response
    {
        $brands = Brand::all()->toJson();

        return response($brands);
    }
}
