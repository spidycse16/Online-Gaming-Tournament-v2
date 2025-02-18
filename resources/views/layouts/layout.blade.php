<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'My Application')</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/addPost.css') }}">
</head>
<body>
    @include('users.navbar') 

    <main class="container">
        @yield('content') 
    </main>

   
</body>
</html>
