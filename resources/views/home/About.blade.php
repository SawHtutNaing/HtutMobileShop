@extends('layouts.app')

@section('title', 'About Us')
@section('content')

<section class="">
 <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:py-12 lg:px-8 text-center">
    <h1 class="text-4xl font-extrabold text-gray-900">About Mobile Store</h1>
    <p class="mt-4 text-lg text-gray-500">Welcome to Mobile Store, your number one source for all things mobile phones. We're dedicated to giving you the very best of mobile devices, with a focus on quality, customer service, and uniqueness.</p>
    <p class="mt-2 text-lg text-gray-500">Founded in 2020 by John Doe, Mobile Store has come a long way from its beginnings. When John first started out, his passion for providing the best equipment drove him to do tons of research, so that Mobile Store can offer you the world's most advanced smartphones. We now serve customers all over the country and are thrilled that we're able to turn our passion into our own website.</p>
    <p class="mt-2 text-lg text-gray-500">We hope you enjoy our products as much as we enjoy offering them to you. If you have any questions or comments, please don't hesitate to contact us.</p>
</div>
</section>

<!-- why us  -->
<section class="text-gray-700 body-font mt-10">
    <div class="flex justify-center text-3xl font-bold text-gray-800 text-center">
        Why Us?
    </div>
    <div class="container px-5 py-12 mx-auto">
        <div class="flex flex-wrap text-center justify-center">
            <div class="p-4 md:w-1/4 sm:w-1/2">
                <div class="px-4 py-6 transform transition duration-500 hover:scale-110">
                    <div class="flex justify-center">
                        <img src="{{asset('static_images/3.jpeg')}}" class="w-32 mb-3 h-40">
                    </div>
                    <h2 class="title-font font-regular text-2xl text-gray-900">Latest Smartphones</h2>
                </div>
            </div>

            <div class="p-4 md:w-1/4 sm:w-1/2">
                <div class="px-4 py-6 transform transition duration-500 hover:scale-110">
                    <div class="flex justify-center">
                        <img src="{{asset('static_images/2.jpeg')}}" class="w-32 mb-3 h-40">
                    </div>
                    <h2 class="title-font font-regular text-2xl text-gray-900">Affordable Prices</h2>
                </div>
            </div>

            <div class="p-4 md:w-1/4 sm:w-1/2">
                <div class="px-4 py-6 transform transition duration-500 hover:scale-110">
                    <div class="flex justify-center">
                        <img src="{{asset('static_images/4.jpeg')}}" class="w-32 mb-3 h-40">
                    </div>
                    <h2 class="title-font font-regular text-2xl text-gray-900">Excellent Customer Service</h2>
                </div>
            </div>

            <div class="p-4 md:w-1/4 sm:w-1/2">
                <div class="px-4 py-6 transform transition duration-500 hover:scale-110">
                    <div class="flex justify-center">
                        <img src="{{asset('static_images/1.jpeg')}}" class="w-32 mb-3 h-40">
                    </div>
                    <h2 class="title-font font-regular text-2xl text-gray-900">Warranty and Support</h2>
                </div>
            </div>

        </div>
    </div>
</section>


<!-- Visit us section -->
<section class="bg-gray-100">
    <div class="max-w-7xl mx-auto py-8 px-4 sm:px-6 lg:py-20 lg:px-8">
        <div class="max-w-2xl lg:max-w-4xl mx-auto text-center">
            <h2 class="text-3xl font-extrabold text-gray-900" id="contactUs">Visit Our Location</h2>
            <p class="mt-3 text-lg text-gray-500">Let us serve you the best</p>
        </div>
        <div class="mt-8 lg:mt-20">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                <div>
                    <div class="max-w-full mx-auto rounded-lg overflow-hidden">
                        <div class="border-t border-gray-200 px-6 py-4">
                            <h3 class="text-lg font-bold text-gray-900">Contact</h3>
                            <p class="mt-1 font-bold text-gray-600"><a href="tel:+123">Phone: +959664988136</a></p>
                            <a class="flex m-1" href="tel:+959664988136">
                                <div class="flex-shrink-0">
                                    <div
                                        class="flex items-center justify-between h-10 w-30 rounded-md bg-indigo-500 p-2">
                                        
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                            stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                d="M2.25 6.75c0 8.284 6.716 15 15 15h2.25a2.25 2.25 0 002.25-2.25v-1.372c0-.516-.351-.966-.852-1.091l-4.423-1.106c-.44-.11-.902.055-1.173.417l-.97 1.293c-.282.376-.769.542-1.21.38a12.035 12.035 0 01-7.143-7.143c-.162-.441.004-.928.38-1.21l1.293-.97c.363-.271.527-.734.417-1.173L6.963 3.102a1.125 1.125 0 00-1.091-.852H4.5A2.25 2.25 0 002.25 4.5v2.25z" />
                                        </svg>
                                        Call now
                                    </div>
                                </div>

                            </a>
                        </div>
                        <div class="px-6 py-4">
                            <h3 class="text-lg font-medium text-gray-900">Our Address</h3>
                            <p class="mt-1 text-gray-600">Yangon , Sule</p>
                        </div>
                        <div class="border-t border-gray-200 px-6 py-4">
                            <h3 class="text-lg font-medium text-gray-900">Hours</h3>
                            <p class="mt-1 text-gray-600">Monday - Sunday : 2pm - 9pm</p>
                        </div>
                    </div>
                </div>
                <div class="rounded-lg overflow-hidden order-none sm:order-first">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1284.219946215548!2d96.15420455663701!3d16.827971157212467!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c193dbc054b8b7%3A0x94d068f9508f755c!2sMyanmar%20Plaza!5e1!3m2!1sen!2smm!4v1723295827331!5m2!1sen!2smm" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

                </div>

            </div>
        </div>
    </div>
</section>
<!-- footer -->
<section>
    <footer class="bg-gray-200 text-white py-4 px-3">
        <div class="container mx-auto flex flex-wrap items-center justify-between">
            <div class="w-full md:w-1/2 md:text-center md:mb-4 mb-8">
                <p class="text-xs text-gray-400 md:text-sm">Copyright 2024 &copy; All Rights Reserved</p>
            </div>
            <div class="w-full md:w-1/2 md:text-center md:mb-0 mb-8">
                <ul class="list-reset flex justify-center flex-wrap text-xs md:text-sm gap-3">
                    <li><a href="#contactUs" class="text-gray-400 hover:text-white">Contact</a></li>
                    <li class="mx-4"><a href="/privacy" class="text-gray-400 hover:text-white">Privacy Policy</a></li>
                </ul>
            </div>
        </div>
    </footer>
</section>


@endsection
