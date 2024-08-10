@extends('layouts.app')

@section('title', 'Home Page')

@section('content')
<div class="flex min-h-screen flex-col justify-center items-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
  @if($errors->any())
    <div class="bg-red-100 text-red-700 p-4 rounded mb-4 w-full max-w-md">
      <ul>
        @foreach($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <div class="text-center mb-8">
    {{-- <img src="{{ asset('storage/images/logo.jpg') }}" class="h-12 mx-auto" alt="Job Hub" /> --}}
    <h2 class="text-3xl font-extrabold text-gray-900 mt-2">Sign in to your account</h2>
  </div>

  <div class="w-full max-w-md">
    <div class="bg-white p-8 rounded-lg shadow-lg">
      <form id="loginForm" action="{{route('login')}}" method="POST" autocomplete="off" class="space-y-6">
        @csrf
        <div>
          <label for="email" class="block text-sm font-medium text-gray-700">Email address</label>
          <div class="mt-1">
            <input id="email" name="email" type="email" required autocomplete="off" class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Enter your email">
          </div>
        </div>

        <div>
          <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
          <div class="mt-1">
            <input id="password" name="password" type="password" required class="appearance-none block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm placeholder-gray-400 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" placeholder="Enter your password">
          </div>
        </div>

        <div>
          <button type="submit" class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">Sign in</button>
        </div>
      </form>
    </div>
    <p class="mt-6 text-center text-sm text-gray-600">
      Don't have an account? <a href="{{route('register')}}" class="font-medium text-indigo-600 hover:text-indigo-500">Register here</a>
    </p>
    <p class="mt-1 text-center text-sm text-gray-600">
      Forgot your password? <a href="/forgot-password" class="font-medium text-indigo-600 hover:text-indigo-500">Click here</a>
    </p>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  document.getElementById('loginForm').addEventListener('submit', function(event) {
    event.preventDefault();

    // Show a loading alert
    Swal.fire({
      title: 'Signing in...',
      text: 'Please wait while we log you in.',
      didOpen: () => {
        Swal.showLoading();
      },
      allowOutsideClick: false,
    });

    // Perform the form submission
    fetch(this.action, {
      method: this.method,
      body: new FormData(this),
      headers: {
        'X-CSRF-TOKEN': document.querySelector('input[name="_token"]').value
      }
    })
    .then(response => response.json().then(data => ({ status: response.status, body: data })))
    .then(({ status, body }) => {
      if (status === 200) {
        // Show success alert
        Swal.fire({
          icon: 'success',
          title: 'Signed in successfully!',
          text: 'You will be redirected shortly.',
        }).then(() => {
          window.location.href = body.redirect || '/';
        });
      } else {
        // Show error alert
        Swal.fire({
          icon: 'error',
          title: 'Sign in failed',
          text: body.message || 'Please check your credentials and try again.'
        });
      }
    })
    .catch(error => {
      // Show error alert
      Swal.fire({
        icon: 'error',
        title: 'Sign in failed',
        text: 'An unexpected error occurred. Please try again.'
      });
    });
  });
</script>
@endsection
