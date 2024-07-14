@extends('layouts.app')

@section('title')
Home Page 
@endsection

@section('content')
<div class=" ">
    @if (count($products) > 1 )
    <div class="container mx-auto p-4">
        <div class="grid gap-4 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($products as $product)
                <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                    <a href="#">
                        <img class="p-8 rounded-t-lg" src="{{ asset('phones_images').'/'.$product['image'] }}" alt="product image" />
                    </a>
                    <div class="px-5 pb-5">
                        <a href="#">
                            <h5 class="text-lg font-medium tracking-light text-gray-700">{{ $product['name'] }}</h5>
                        </a>
                        <div class="flex items-center justify-between mt-2 mb-5">
                            <span class="text-2xl font-extrabold text-gray-900">{{ $product['price'] }} ks</span>
                            <a href="{{route('add-to-cart' ,$product['id'])}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center">Add to cart</a>
                        </div>
                    </div>
                </div>
            @endforeach    
        </div>
    </div>
    @endif
</div>
@endsection
