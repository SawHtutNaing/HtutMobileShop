@extends('layouts.app')

@section('title')
Home Page 
@endsection

@section('content')
    <div class="mt-10">
        <form class="max-w-md mx-auto" action="{{ route('filter-product') }}" method="GET" id="filter-form">
            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only">Search</label>
            <div class="relative">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                    </svg>
                </div>
                <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border rounded-lg border-black focus:border-none" name="name" placeholder="Search products..." />
                <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2">Search</button>
            </div>

            <h1 class="mt-5 text-center">Price</h1>
            <div class="max-w-md mx-auto mt-5 flex gap-x-3">
                <!-- Min price input -->
                <div class="flex flex-col">
                    <label for="min-price" class="mb-1 text-gray-700">Min Price</label>
                    <input type="number" name="min" id="min-price" class="p-2 border border-gray-300 rounded" placeholder="Min">
                </div>
                <!-- Max price input -->
                <div class="flex flex-col">
                    <label for="max-price" class="mb-1 text-gray-700">Max Price</label>
                    <input type="number"  name="max" id="max-price" class="p-2 border border-gray-300 rounded" placeholder="Max">
                </div>
            </div>

            <h1 class="mt-5 text-center">Categories</h1>
            <div class="max-w-md mx-auto mt-5">
                <select name="category_id" id="category" class="block w-full p-4 border rounded-lg border-black" onchange="document.getElementById('filter-form').submit();">
                    <option value="">Select Category</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </form>
    </div>

    @if (count($products) > 1 )
    <div class="container mx-auto p-4">
        <div class="flex flex-wrap -mx-4">
            @foreach ($products as $product)
            <div class="w-full sm:w-1/2 lg:w-1/3 px-4 mb-8">
                <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                    <a href="{{ route('product.show', $product['id']) }}">
                        <img class="p-8 rounded-t-lg" src="{{ asset('phones_images').'/'.$product['image'] }}" alt="product image" />
                    </a>
                    <div class="px-5 pb-5">
                        <a href="{{ route('product.show', $product['id']) }}">
                            <h5 class="text-lg font-medium tracking-light text-gray-700">{{ $product['name'] }}</h5>
                        </a>
                        <div class="flex items-center justify-between mt-2 mb-5">
                            <span class="text-2xl font-extrabold text-gray-900">{{ $product['price'] }} ks</span>
                            @auth
                                
                            <a href="{{ route('add-to-cart', $product['id']) }}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center">Add to cart</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection
