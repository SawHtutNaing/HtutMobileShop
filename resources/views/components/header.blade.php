<nav class="bg-white border-gray-200 px-4 py-2.5 dark:bg-gray-800">
    <div class="container flex flex-wrap items-center justify-between mx-auto">
        <a href="{{route('home')}}" class="flex items-center">
            <span class="self-center text-xl font-semibold whitespace-nowrap dark:text-white">Mobile Store</span>
        </a>
        <button data-collapse-toggle="navbar-collapse" type="button" class="inline-flex items-center p-2 ml-3 text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600" aria-controls="navbar-collapse" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd"></path>
            </svg>
        </button>
        <div class="hidden w-full md:block md:w-auto" id="navbar-collapse">
            <ul class="flex flex-col mt-4 md:flex-row md:space-x-8 md:mt-0 md:text-sm md:font-medium">
                <li>
                    <a href="{{route('home')}}" class="block py-2 pl-3 pr-4 text-gray-700 rounded md:bg-transparent md:p-0 dark:text-white" aria-current="page">Home</a>
                </li>
                @guest
                <li>
                    <a href="{{route('login')}}" class="block py-2 pl-3 pr-4 text-gray-700 rounded md:bg-transparent md:p-0 dark:text-white">Login</a>
                </li>
                <li>
                    <a href="{{route('register')}}" class="block py-2 pl-3 pr-4 text-gray-700 rounded md:bg-transparent md:p-0 dark:text-white">Register</a>
                </li>
                @endguest
                @auth
                <li>
                    <a href="{{route('cart-view')}}" class="block py-2 pl-3 pr-4 text-gray-700 rounded md:bg-transparent md:p-0 dark:text-white">Cart</a>
                </li>
                @endauth
                @auth
                {{-- <li>
                    <a href="{{route('profile')}}" class="block py-2 pl-3 pr-4 text-gray-700 rounded md:bg-transparent md:p-0 dark:text-white">Profile</a>
                </li> --}}
                @endauth
                @auth
                <li>
                    <a href="{{route('record')}}" class="block py-2 pl-3 pr-4 text-gray-700 rounded md:bg-transparent md:p-0 dark:text-white">Record</a>
                </li>
                <li>
                    <a href="{{route('logout')}}" class="block py-2 pl-3 pr-4 text-gray-700 rounded md:bg-transparent md:p-0 dark:text-white">Logout</a>
                </li>
                
                @endauth
            </ul>
        </div>
    </div>
</nav>
