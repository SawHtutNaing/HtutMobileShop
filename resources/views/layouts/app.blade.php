<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<title>
    @yield('title')
</title>
@vite('resources/css/app.css')




<!-- Add these at the end of the body section -->


<body>


@include('components/header')
    
    @yield('content')
    

</body>
@vite( 'resources/js/app.js')

</html>