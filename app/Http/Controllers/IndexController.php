<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index() : object
    {
        return view('index');
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
}
