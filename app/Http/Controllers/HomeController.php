<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $products = Product::where('quantity', ">", 0)->get()->toArray();
        return view('home/index', ['products' => $products, 'categories' => $categories]);
    }

    public function About()
    {

        return view('home/About');
    }
}
