<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {

        $products = Product::where('quantity', ">", 0)->get()->toArray();
        return view('home/index', compact('products'));
    }
}
