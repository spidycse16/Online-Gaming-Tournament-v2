<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/basedetails.css') }}">
    <title>Base Details</title>
</head>
<body>
   <div class="main-container">
       @foreach ($bases as $base)
       <div class="container">
           <p class="title">{{ $base->title }}</p>
           <img src="{{ asset($base->image) }}" alt="Base Image">

           <div class="action-buttons">
           
               <form action="/likes-control/{{$base->id}}" method="POST">
                   @method('PUT')
                   @csrf
                   <button class="likes">
                       <div class="logo">
                           <img src="{{ asset('images/like.png') }}" alt="Like">
                       </div>
                       Like 
                       <div class="number">
                           <p>{{ $base->likes }}</p>
                       </div>
                   </button>
               </form>

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
               <form action="/base-details" method="POST">
                   @method('PUT')
                   @csrf
                   <button class="details"><i class="fas fa-info-circle"></i> Download</button>
               </form>
           </div>
       </div>
       @endforeach
   </div>
</body>
</html>
