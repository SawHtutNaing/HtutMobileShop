@extends('layouts.app')

@section('title', 'Home Page')
@section('content')
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <!-- Product Details -->
        <div class="bg-white rounded-lg shadow-lg p-6">
            <div class="flex flex-col lg:flex-row items-center">
                <img class="w-full lg:w-1/3 rounded-lg mb-4 lg:mb-0 lg:mr-4" src="{{ asset('phones_images/' . $product->image) }}" alt="{{ $product->name }}">
                <div class="w-full lg:w-2/3">
                    <h1 class="text-3xl font-bold mb-2">{{ $product->name }}</h1>
                    <p class="text-gray-700 mb-4">{{ $product->description }}</p>
                    <p class="text-2xl font-semibold text-blue-600 mb-4">{{ $product->price }} Ks</p>
                    <div class="flex items-center">
                        <a href="{{ route('add-to-cart', $product->id) }}" class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                            Add to Cart
                        </a>
                    </div>
                </div>
            </div>
        </div>

        <!-- Reviews Section -->
        <div class="bg-white rounded-lg shadow-lg p-6 mt-8">
            <h2 class="text-2xl font-bold mb-4">Reviews</h2>
            <div class="space-y-4">
                @if($product->reviews)
                @foreach ($product->reviews as $review)
                <div class="bg-gray-50 p-4 rounded-lg relative">
                    <div id="review-display-{{ $review->id }}">
                        <p class="text-md font-semibold">{{ $review->user->name }}</p>
                        <p class="text-gray-800">{{ $review->content }}</p>
                        <p class="text-sm text-gray-500">{{ $review->created_at->format('F j, Y, g:i a') }}</p>
                    </div>
                    @auth
                        @if (auth()->user()->id === $review->user_id)
                        <div class="absolute top-0 right-0 mt-4 mr-4 flex space-x-2">
                            <!-- Edit Button -->
                            <button onclick="toggleEditMode({{ $review->id }})" class="text-blue-500 hover:text-blue-700">Edit</button>
                            <!-- Delete Button -->
                            <form action="{{ route('reviews.destroy',$review->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this review?');">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-red-500 hover:text-red-700">Delete</button>
                            </form>
                        </div>
                        @endif
                    @endauth

                    <!-- Edit Form -->
                    <div id="review-edit-{{ $review->id }}" class="hidden">
                        <form action="{{ route('reviews.update', $review->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <textarea name="content" class="w-full p-2 border rounded-md">{{ $review->content }}</textarea>
                            <div class="flex justify-end space-x-2 mt-2">
                                <button type="button" onclick="toggleEditMode({{ $review->id }})" class="bg-gray-300 px-4 py-2 rounded-md">Cancel</button>
                                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-md">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
                @endforeach
                @endif 
            </div>
        </div>

        <!-- Review Form -->
        @auth
        <div class="bg-white rounded-lg shadow-lg p-6 mt-8">
            <h2 class="text-2xl font-bold mb-4">Leave a Review</h2>
            <form action="{{ route('reviews.store', $product->id) }}" method="POST" class="space-y-4">
                @csrf
                <div>
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <label for="content" class="block text-sm font-medium text-gray-700">Your Review</label>
                    <textarea id="content" name="content" rows="4" class="block w-full mt-1 border-gray-300 rounded-md shadow-sm focus:ring-blue-500 focus:border-blue-500" required></textarea>
                </div>
                <div>
                    <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded-lg shadow hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500">
                        Submit Review
                    </button>
                </div>
            </form>
        </div> 
        @endauth
    </div>

    <script>
        function toggleEditMode(reviewId) {
            const displayDiv = document.getElementById('review-display-' + reviewId);
            const editDiv = document.getElementById('review-edit-' + reviewId);

            displayDiv.classList.toggle('hidden');
            editDiv.classList.toggle('hidden');
        }
    </script>
</body>
@endsection
