<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Income;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        //
    }

    public function CartIndex()
    {

        $user = Auth::user();
        $products = $user->Procuts;


        return view('home/cart', compact('products'));
    }

    public function addToCart(Product $product)
    {
        $user = auth()->user();

        $product->users()->attach($user->id);




        $product->quantity -= 1;
        $product->update();
        return redirect()->route('home');
    }

    public function removeFromCart(Product $product)
    {
        $user = auth()->user();
        $product->users()->detach($user->id);
        $product->quantity += 1;
        $product->save();

        return redirect()->route('home');
    }

    public function singlePurchase(Product $product)
    {
        $user = auth()->user();
        $product->buyProduct();
        // $product->quantity -= 1;
        // $totalCost = $product->price - $product->promotion;
        // $product->users()->detach($user->id);
        // Income::create([
        //     'money' => $totalCost,
        //     'user_id' => $user->id,
        //     'product_id' => $product->id,
        //     'supplier_id' => $product->supplier_id
        // ]);

        return redirect()->route('home');
    }

    public function buldPurchase()
    {
        $user = auth()->user();
        $products = $user->Procuts;
        foreach ($products as  $product) {
            $product->buyProduct();
        }
        return redirect()->route('home');
    }
}
