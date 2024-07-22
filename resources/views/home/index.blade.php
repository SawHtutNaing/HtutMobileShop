@extends('layouts.app')

@section('title')
Home Page 
@endsection

@section('content')
    <div class=" ">
    <div class=" mt-10 ">

    
<form class="max-w-md mx-auto" action="{{route('filter-product')}}">   
    <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only ">Search</label>
    <div class="relative">
        <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
            <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
            </svg>
        </div>
        <input type="search" id="default-search" class="block w-full p-4 ps-10 text-sm text-gray-900 border rounded-lg border-black focus:border-none"  name="name"   />
        <button type="submit" class="text-white absolute end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
    </div>
    <h1 class=" mt-5 text-center">
        Price
    </h1>
    <div class="max-w-md mx-auto mt-5 flex gap-x-3">
            <div class="relative flex items-center max-w-[15rem]">
                <label for="">Min</label>
                <br>       
            <button type="button" id="decrement-button" data-input-counter-decrement="min" class="bg-gray-100 hover:bg-gray-200 border ms-5 border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                <svg class="w-3 h-3 text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
                </svg>
            </button>
            <input type="number" name="min" min="0" id="min" data-input-counter aria-describedby="helper-text-explanation" class="bg-whtie border-x-0 border-gray-300 h-11 text-center text-black  focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5"  />
            <button type="button" id="increment-button" data-input-counter-increment="min" class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 focus:ring-2 focus:outline-none">
                <svg class="w-3 h-3 text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
                </svg>
            </button>
        </div>

        {{-- ------------ max ------------------ --}}
        <div class="relative flex items-center max-w-[15rem]">
            <label for="">Max</label>
            <br>       
        <button type="button" id="decrement-button" data-input-counter-decrement="max" class="bg-gray-100 hover:bg-gray-200 border ms-5 border-gray-300 rounded-s-lg p-3 h-11 focus:ring-gray-100 focus:ring-2 focus:outline-none">
            <svg class="w-3 h-3 text-black" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 2">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 1h16"/>
            </svg>
        </button>
        <input type="number" name="max" min="0" id="max" data-input-counter aria-describedby="helper-text-explanation" class="bg-whtie border-x-0 border-gray-300 h-11 text-center text-black  focus:ring-blue-500 focus:border-blue-500 block w-full py-2.5"  />
        <button type="button" id="increment-button" data-input-counter-increment="max" class="bg-gray-100 hover:bg-gray-200 border border-gray-300 rounded-e-lg p-3 h-11 focus:ring-gray-100 focus:ring-2 focus:outline-none">
            <svg class="w-3 h-3 text-gray-900" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 18">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 1v16M1 9h16"/>
            </svg>
        </button>
    </div>
        
    </div>
    
</form>

    </div>
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
