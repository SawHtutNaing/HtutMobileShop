@extends('layouts.app')
@section('title', 'Verification')

@section('content')

<div class="container mx-auto mt-9">
    <div class="flex justify-center">
        <div class="w-full max-w-md">
            <div class="bg-white shadow-md rounded-lg">
                <div class="bg-gray-200 px-4 py-2 font-semibold text-lg">{{ __('Verify Your Email Address') }}</div>

                <div class="p-4">
                    @if (session('status') == 'verification-link-sent')
                        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    <p class="mb-4">{{ __('Before proceeding, please check your email for a verification link.') }}</p>
                    <p class="mb-4">{{ __('If you did not receive the email') }},
                    <form class="inline" method="POST" action="{{ route('verification.send') }}">
                        @csrf
                        <button type="submit" class="text-blue-500 hover:underline">{{ __('click here to request another') }}</button>.
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
