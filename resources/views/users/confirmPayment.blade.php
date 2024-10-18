<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <div style="margin-left:180px; margin-top:10px;">
        @include('users.navbar')
    </div>
</head>
<body>
    
    @if(session('success'))
    <div class="alert alert-success" style="text-align: center;">
        {{session('success')}}
        @endif
    </div>
    <div style="text-align: center;">

        <h2 style="margin-bottom:10px;">Confirm Payment[impliment payment option]</h2>
        <form action="/payment-done/{{$tournament->id}}" method="POST">
            @csrf
            <button style="text-align: center; border:2px solid; padding: 5px; margin-bottom:20px; text-decoration:none; background-color:blanchedalmond; color:black;">Payment Done</button>
        </form>
        <a href="/payment-not-done/{{$tournament->id}}" style="text-align: center; border:2px solid; padding: 5px; margin-top:20px; text-decoration:none; background-color:blanchedalmond; color:black;">Payment not Done</a>

        {{-- <form action="/payment-done">
            <button>Done</button>
        </form>
        <form action="/payment-not-done" style="margin-top:20px">
            @csrf
            <button>Not Done</button> --}}
        </form>
    </div>
</body>
</html>