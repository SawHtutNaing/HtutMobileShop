@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
<div class="flex min-h-screen flex-col justify-center px-4 py-5 lg:px-8">

  @if($errors->any())
    <ul class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
      @foreach($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  @endif

  <div class="text-center mb-4">
    {{-- <img src="{{ asset('storage/images/logo.jpg') }}" class="h-8" alt="Job Hub" /> --}}
    <h2 class="text-xl font-semibold text-gray-800 mt-2">Reset Your Password</h2>
  </div>

  <div class="mx-auto w-full max-w-sm">
    <form action="{{route('password.update')}}" method="POST" autocomplete="off">
      @csrf
      <input type="text" name="token" hidden value="{{$token}}">
      <div class="mb-4">
        <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
        <input id="email" name="email" type="email" required autocomplete="off" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Enter your email">
      </div>

      <div class="mb-4">
        <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
        <input id="password" name="password" type="password" required class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Enter your password">
      </div>
      <div class="mb-4">
        <label for="confirm-password" class="block text-sm font-medium text-gray-700">Confirm password</label>
        <input type="password" name="password_confirmation" id="confirm-password" class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="••••••••" required>
    </div>

      <div class="text-center">
        <button type="submit" class="w-full px-4 py-2 bg-blue-500 text-white font-semibold rounded-md shadow-sm hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Sign in</button>
      </div>
    </form>

  </div>
</div>
@endsection