@extends('layouts.app')

@section('title', 'Home Page')
@section('content')
<?php 
$user = Auth::user();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<body>
  

  <div class="p-16">
    <div class="p-8 bg-white shadow mt-24">
      <div class="grid grid-cols-1 md:grid-cols-3">
        <div class="grid grid-cols-3 text-center order-last md:order-first mt-20 md:mt-0">
        
    
     
        </div>
        <div class="relative">
          <div class="w-48 h-48 bg-indigo-100 mx-auto rounded-full shadow-2xl absolute inset-x-0 top-0 -mt-24 flex items-center justify-center text-indigo-500">
    @if ($user->personalDetails?->profile_img)
{{-- @dd(asset('').$user->personalDetails?->profile_img) --}}
    <img   class="" src="{{ asset('storage').'/'.$user->personalDetails?->profile_img}}" alt="">
        
    @else
          <svg xmlns="http://www.w3.org/2000/svg" class="h-24 w-24" viewBox="0 0 20 20" fill="currentColor">
      <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
    </svg>
    @endif
          
          </div>
        </div>
    
     {{-- <div class="space-x-8 flex justify-between mt-32 md:mt-0 md:justify-center">
          <a href="{{route('profileSetting')}}">
          <button
      class="text-white py-2 px-4 uppercase rounded bg-blue-400 hover:bg-blue-500 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5"
    > 
   
        <i class="fa-solid fa-gears"></i> Setting
 
    </button> 
  </a>
  <a         href="{{route('logout')}}">
        <button
 
      class="text-white py-2 px-4 uppercase rounded bg-gray-700 hover:bg-gray-800 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5"
    >
   Logout
        </button>
      </a>
        </div>  --}}
      </div>
    
      <div class=" mt-36 text-center border-b pb-12">
        <h1 class="text-4xl font-medium text-gray-700">{{Auth::user()->name}} <span class="font-light text-gray-500"></span></h1>
        <p class="ms-2 text-sm font-medium  dark:text-gray-500">{{Auth::user()->email}}</p>
    
        <p class="ms-2 text-sm font-medium  dark:text-gray-500">Address - Yangon , Mayangone </p>
        <p class="ms-2 text-sm font-medium  dark:text-gray-500">Phone - 09883337776 </p>
      
        
        
      </div>
{{--     
      <div class="mt-12 flex flex-col justify-center">
        <p class="text-gray-600 text-center font-light lg:px-16">An artist of considerable range, Ryan — the name taken by Melbourne-raised, Brooklyn-based Nick Murphy — writes, performs and records all of his own music, giving it a warm, intimate feel with a solid groove structure. An artist of considerable range.</p>
        <button
      class="text-indigo-500 py-2 px-4  font-medium mt-4"
    >
      Show more
    </button>
      </div> --}}
      {{-- {{
    dd(    $user->AppliedJOb[0]->job)
      }} --}}

      <div class="mt-10 mx-auto w-5/6 grid grid-cols-1   gap-y-14  gap-4">
        @auth
        @if (  $user->profile_type == 'personal')

        @if (count($user->AppliedJOb) > 0)
        @foreach ($user->AppliedJOb as $appliedJob)
        {{-- {{dd($appliedJob)}} --}}
        <a href="{{route('viewMyAppliedJOb',$appliedJob?->job_id)}}">
          {{-- {{dd($appliedJob?->job)}} --}}
        @include('components.JobCard',['job'=>$appliedJob->job])
        </a>
            
        @endforeach
        @endif

     
 
            
        @elseif(  $user->profile_type== 'company')
        @if (count($user->PostedJobs) > 0)

        @foreach ($user->PostedJobs as $postedJob)
        
        <a href="{{route('viewMyPostedJOb',$postedJob?->id)}}">
        @include('components.JobCard',['job'=>$postedJob])
        </a>
            
        @endforeach
        @endif

        @endif

       

        @endauth

        
 
      </div>
    </div>
    </div>
    

</body>
</html>

@endsection