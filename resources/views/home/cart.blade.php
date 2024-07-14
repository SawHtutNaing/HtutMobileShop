@extends('layouts.app')

@section('title')
Home Page 
@endsection

@section('content')
<div class=" ">
    
    @if (count($products) > 0  )
    <div class="container mx-auto p-4">
        <div class="grid gap-4 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
            @foreach ($products as $product)
                <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                    <a href="#">
                        <img class="p-8 rounded-t-lg" src="{{ asset('phones_images').'/'.$product['image'] }}" alt="product image" />
                    </a>
                    <div class="px-5 pb-5">
                        <a href="#">
                            <h5 class="text-xl font-semibold tracking-tight text-gray-900">{{ $product['name'] }}</h5>
                        </a>
                        <div class="flex items-center justify-between mt-2.5 mb-5">
                            <span class="text-3xl font-bold text-gray-900">{{ $product['price'] }} kyat</span>
                        </div>
                        <div class="flex items-center justify-between mt-2 mb-5">
                            
                            <a href="{{route('remove-from-cart' ,$product['id'])}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center">Remove From cart</a>
                        </div>
                        <div class="flex items-center justify-between mt-2 mb-5">
                            
                            <a href="{{route('sigle-purchase' ,$product['id'])}}" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2.5 text-center">Buy Single</a>
                        </div>
                    </div>

                </div>
            @endforeach
        </div>

        @php
            $totalPrice = 0;
            foreach ($products as $product) {
                $totalPrice += $product['price'];
            }
        @endphp

        <div class="flex justify-end mt-8">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                <a href="{{route('bulk-purchase')}}">
                Purchase - Total: {{ $totalPrice }} kyat

                </a>
            </button>
        </div>
    </div>
    @endif
</div>
@endsection
