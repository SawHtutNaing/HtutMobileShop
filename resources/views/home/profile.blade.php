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
               
                   
                   

   

                <div class="mt-20 text-center border-b pb-12">
                    <h1 class="text-4xl font-medium text-gray-700">{{ Auth::user()->name }} <span
                            class="font-light text-gray-500"></span></h1>
                    <p class="ms-2 text-sm font-medium  dark:text-gray-500">{{ Auth::user()->email }}</p>

                    <p class="ms-2 text-sm font-medium  dark:text-gray-500">Address - {{ $user->address }}
                      <p class="ms-2 text-sm font-medium  dark:text-gray-500">Phone - {{ $user->phone_number }}
                    </p>
                            </div>
              
                            <div class="space-x-8 flex justify-between mt-32 md:mt-0 md:justify-center">
                              <a href="{{ route('profileSettingEdit') }}">
                                  <button
                                      class="text-white py-2 px-4 uppercase rounded bg-blue-400 hover:bg-blue-500 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5"
                                      style="width: 150px; height: 50px;">
                                      <i class="fa-solid fa-gears"></i> Setting
      
                                  </button>
                              </a>
                              <a href="{{ route('logout') }}">
                                  <button
                                      class="text-white py-2 px-4 uppercase rounded bg-gray-700 hover:bg-gray-800 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">
                                      Logout
                                  </button>
                              </a>
                          </div>
            </div>
        </div>


    </body>

    </html>

@endsection