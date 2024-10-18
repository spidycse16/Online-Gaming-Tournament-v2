<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Homepage</title>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<header>
   
    <div class="logo container">
        <img src="{{asset('images/logo.jpg')}}" alt="logo" class="logo">
    </div>
  
    <div style="text-align: center;"> 
        @include('users.navbar')
    </div>
    <br>
    </header>
</body>
</html>