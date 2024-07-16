@extends('layouts.app')

@section('title', 'Home Page')
@section('content')







    <form class="space-y-4 md:space-y-6 max-w-md mx-auto" method="POST"  action="{{route('profileSettingUpdate')}}" enctype="multipart/form-data">
        @csrf
        <div>
          
            <label for="Name" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your Name</label>
            <input type="text" name="name" id="name" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your Name..." required="" value="{{Auth::user()->name}}">
        </div>
        <div>
            <label for="email" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your email</label>
            <input type="email" name="email" id="email" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="name@company.com" required="" value="{{Auth::user()->email}}">
        </div>
        
        
        
        

        <div>
          
            <label for="address" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your address</label>
            <input type="text" name="address" id="address" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your address..." value="{{Auth::user()->address}}"  >
        </div>
      
        <div>
          
            <label for="phone" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Your phone</label>
            <input type="text" name="phone" id="phone" class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="Your phone..."   value="{{Auth::user()->phone}}">

        </div>

        <div class="mb-4 md:mb-0">
            <label for="personal_photo" class="block text-gray-700 text-sm mb-2">Your Photo</label>
            <input type="file" id="personal_photo" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3  px-8  mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" name="profile_img">
            <div id='personal_photo-preview'></div>  
       
        </div>

     


        <button type="submit" class="w-full  bg-indigo-800 focus:ring-4 focus:outline-none focus:ring-primary-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center text-white">Save Changes</button>
      
    </form>

</form>
<script src="https://code.jquery.com/jquery-3.7.1.slim.js" integrity="sha256-UgvvN8vBkgO0luPSUl2s8TIlOSYRoGFAX4jlCIm9Adc=" crossorigin="anonymous"></script>


<script>
       $(document).ready(function() {
            
            // Function to handle file input change
            $('#personal_photo').change(function() {
                var input = this;
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#personal_photo-preview').html('<img src="' + e.target.result +
                            '" class="max-w-full h-auto">');
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            });

            $('#cover_photo').change(function() {
                var input = this;
                if (input.files && input.files[0]) {
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        $('#cover_photo-preview').html('<img src="' + e.target.result +
                            '" class="max-w-full h-auto">');
                    };
                    reader.readAsDataURL(input.files[0]);
                }
            });
        });
</script>
@endsection