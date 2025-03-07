<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/downloadBase.css') }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <div style="margin-left:180px;">
        @include('users.navbar')
    </div>
    <title>DownLoad Base</title>
</head>
<body>
    <h1>hi</h1>
    <div class="container">
        <p class="title">{{ $base->title }}</p>
        <img src="{{ asset($base->image) }}" alt="Base Image">
    
        <div class="action-buttons">
            <div class="likes">
                <div class="logo">
                    <img src="{{ asset('images/like.png') }}" alt="Like">
                </div>
                Like
                <div class="number">
                    <p>{{ $base->likes }}</p>
                </div>
            </div>
    
            <div class="views">
                <div class="logo">
                    <img src="{{ asset('images/views.png') }}" alt="Views">
                </div>
                Views
                <div class="number">
                    <p>{{ $base->views }}</p>
                </div>
            </div>
    
            <div class="downloads">
                <div class="logo">
                    <img src="{{ asset('images/downloads.jpg') }}" alt="Downloads">
                </div>
                Downloads
                <div class="number">
                    <p>{{ $base->downloads }}</p>
                </div>
            </div>
        </div>
    
        <div class="details-button">
            <form action="/download-control/{{$base->id}}" method="POST">
                @csrf
                <button class="details"> Download Base</button>
            </form>
        </div>
    </div>
    
</body>
</html>