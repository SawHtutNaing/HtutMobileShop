<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Models\Income;
use App\Models\Product;
use App\Models\ProductUser;
use App\Models\Tax;
use Illuminate\Http\Request;
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

        $cartLists = $user->ItemsInCart();
        return view('home/cart', compact('cartLists'));
    }

    public function addToCart(Product $product)
    {
        $tax = Tax::currentTax();
        $user = auth()->user();
        $price = $product->price - $product->promotion;
        $priceAndTax = $price + (($price * $tax->tax_percent) / 100);
        $product->users()->attach($user->id, ['amount' => $priceAndTax]);
        $product->quantity -= 1;
        $product->update();
        return redirect()->route('home');
    }

    public function removeFromCart(ProductUser $productUser)
    {


        $productUser->product['quantity'] += 1;
        $productUser->product->update();
        $productUser->delete();

        return redirect()->route('home');
    }

    public function singlePurchase(ProductUser $productUser)
    {
        $user = auth()->user();
        Income::create([
            'money' => $productUser->amount,
            'user_id' => $productUser->user_id,
            'product_id' => $productUser->product_id,
            'supplier_id' => $productUser->product->supplier_id
        ]);
        $productUser->delete();
        $productUser->product->sell_count += 1;
        $productUser->product->update();
        return redirect()->route('home');
    }

    public function buldPurchase()
    {
        $user = auth()->user();
        $ItemsInCarts = $user->ItemsInCart();
        foreach ($ItemsInCarts as  $ItemsInCart) {
            Income::create([
                'money' => $ItemsInCart->amount,
                'user_id' => $ItemsInCart->user_id,
                'product_id' => $ItemsInCart->product_id,
                'supplier_id' => $ItemsInCart->product->supplier_id
            ]);
            $ItemsInCart->product->sell_count += 1;

            $ItemsInCart->product->update();

            $ItemsInCart->delete();
        }
        return redirect()->route('home');
    }


    public function filter(Request $request)
    {

        $query = Product::query();
        if (!is_null($request->name)) {

            $query->where('name', 'like', '%' . $request->name . '%');
        }
        if (!is_null($request->min)) {

            $query->where('price', '>',  $request->min);
        }
        if (!is_null($request->max)) {
            $query->where('price',  '<',  $request->max);
        }



        $products = $query->get();

        return view('home/index', compact('products'));
    }
}
