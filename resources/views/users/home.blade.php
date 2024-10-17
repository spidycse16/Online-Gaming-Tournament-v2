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
            <nav>
                <ul class="nav">
                    <li><a href="/tournaments">Tournaments</a></li>
                    <li><a href="/coc-bases">COC base links</a></li>
                    <li><a href="/royale-deck">Clash Royale Decks</a></li>
                    <li><a href="/blog">Blog</a></li>
                    <li><a href="/about-us">About us</a></li>
                    <li><a href="/my-tournaments/{{$id}}">My Tournaments</a></li>
                    <li>
                        <form action="/logout" method="POST" style="display: inline;">
                            @csrf
                            <button type="submit" name="logout" class="btn btn-danger">Logout</button>
                        </form>
                    </li>
                </ul>
            </nav>
        </div>
    </header>
</body>
</html>