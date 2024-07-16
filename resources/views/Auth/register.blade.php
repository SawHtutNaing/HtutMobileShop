@extends('layouts.app')

@section('title', 'Home Page')

@section('content')

<section class="bg-gray-100">
    <div class="flex flex-col items-center justify-center px-4 py-5 mx-auto" style="min-height: 100vh;">
        {{-- <a href="#" class="flex items-center mb-4 text-gray-800">
            <img class="mr-2" src="{{ asset('storage/images/logo.jpg') }}" alt="Job Hub" style="width: 32px; height: 32px;">
            Job Hub
        </a> --}}

        <div class="w-full max-w-md bg-white rounded-lg shadow-lg border border-gray-200">
            <div class="p-6">
                <h1 class="text-xl font-bold text-gray-800 mb-4">
                    Create an account
                </h1>
                @if($errors->any())
                <div class="bg-red-100 text-red-700 p-4 rounded mb-4">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form method="POST" action="{{ route('register') }}" id="registerForm">
                    @csrf
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700 font-semibold mb-2">Your Name</label>
                        <input type="text" name="name" id="name" class="w-full p-2 border border-gray-300 rounded" placeholder="Your Name..." required>
                    </div>
                    <div class="mb-4">
                        <label for="email" class="block text-gray-700 font-semibold mb-2">Your email</label>
                        <input type="email" name="email" id="email" class="w-full p-2 border border-gray-300 rounded" placeholder="name@company.com" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="phone_number" class="block text-gray-700 font-semibold mb-2">Your Phone</label>
                        <input type="text" name="phone_number" id="phone_number" class="w-full p-2 border border-gray-300 rounded" placeholder="Phone number" required minlength="11">
                    </div>
                    {{-- <div class="mb-4">
                        <label for="address" class="block text-gray-700 font-semibold mb-2">Your Address</label>
                        <input type="text" name="address" id="phone_number" class="w-full p-2 border border-gray-300 rounded" placeholder="Phone number" required minlength="11">
                    </div> --}}
                    
                    <div class="mb-4">
                        <label for="address" class="block text-gray-700 font-semibold mb-2">Address</label>
                        <input type="text" name="address" id="address" class="w-full p-2 border border-gray-300 rounded" required>
                    </div>
                    
                    <div class="mb-4">
                        <label for="password" class="block text-gray-700 font-semibold mb-2">Password</label>
                        <input type="password" name="password" id="password" class="w-full p-2 border border-gray-300 rounded" placeholder="••••••••" required>
                    </div>
                    <div class="mb-4">
                        <label for="confirm-password" class="block text-gray-700 font-semibold mb-2">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="confirm-password" class="w-full p-2 border border-gray-300 rounded" placeholder="••••••••" required>
                    </div>

                    <button type="submit" form="registerForm" class="w-full bg-blue-500 text-white py-2 rounded hover:bg-blue-600 focus:outline-none focus:ring-4 focus:ring-blue-300">Create an account</button>
                    <p class="text-center mt-4 text-gray-600">
                        Already have an account? <a href="{{ route('login') }}" class="text-blue-500 hover:underline">Login here</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</section>

@endsection
