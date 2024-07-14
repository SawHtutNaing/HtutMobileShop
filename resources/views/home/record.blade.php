@extends('layouts.app')

@section('title', 'Home Page')
@section('content')
<?php 
$user = Auth::user();
 $totalExpense = $user->TotalExpense();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Record</title>
</head>
<body>
<h1 class=" text-center mt-24 text-bold text-3xl ">
  @if ($totalExpense > 1)
      you have expense  {{$totalExpense}} from us .
  @endif
</h1>
  @if (count($records) > 1 )
  <div class="container mx-auto p-4">
      <div class="grid gap-4 grid-cols-1 sm:grid-cols-2 lg:grid-cols-3">
          @foreach ($records as $record)
          
              <div class="w-full max-w-sm bg-white border border-gray-200 rounded-lg shadow">
                  <a href="#">
                      <img class="p-8 rounded-t-lg" src="{{ asset('phones_images').'/'.$record->product['image'] }}" alt="record image" />
                  </a>
                  <div class="px-5 pb-5">
                      <a href="#">
                          <h5 class="text-lg font-medium tracking-light text-gray-700">{{ $record->product['name'] }}</h5>
                      </a>
                      <div class="flex items-center justify-between mt-2 mb-5">
                          <span class="text-2xl font-extrabold text-gray-900">{{ $record->product['price'] }} ks</span>
                        
                      </div>
                      <div>
                        Buy At - {{$record->created_at}}
                      </div>
                  </div>
              </div>
          @endforeach    
      </div>
  </div>
  @endif

</body>
</html>

@endsection