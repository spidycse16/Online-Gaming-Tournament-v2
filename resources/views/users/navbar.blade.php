<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <title>Document</title>
</head>
<body>
    <nav>
        <ul class="nav">
            <li><a href="/tournaments">Tournaments</a></li>
            <li><a href="/coc-bases">COC base links</a></li>
            <li><a href="/royale-deck">Clash Royale Decks</a></li>
            <li><a href="/blog">Blog</a></li>
            <li><a href="/about-us">About us</a></li>
            <li><a href="/my-tournaments/{{Auth::id()}}">My Tournaments</a></li>
            <li>
                <form action="/logout" method="POST" style="display: inline;">
                    @csrf
                    <button type="submit" name="logout" class="btn btn-danger"">Logout</button>
                </form>
            </li>
        </ul>
    </nav>
</body>
</html>