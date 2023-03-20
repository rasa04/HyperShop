<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class ProductsController extends Controller
{
    public function index() : Response
    {
        $products = Product::orderBy('created_at')->paginate(12);
        return response($products);
    }
    public function show(Request $request) : Response
    {
        $product_id = $request->route()->id;
        $product = Product::where('id', '=', $product_id)->first();

        $product['brand'] = $product->brand()->first()->name;
        return response($product);
    }
}
