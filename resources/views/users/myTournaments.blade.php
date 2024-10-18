<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Tournaments</title>
    <link rel="stylesheet" href="{{ asset('css/tournament.css') }}">
    <div style="margin-left: 180px">
        @include('users.navbar')
    </div>
</head>
<body>
    
@if (session('success'))
    <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
    <div class="tournament-container">
        @foreach ($matches as $match)
        <div class="tournament-details">
            <img src="{{ asset($match->image) }}" alt="Tournament Image" style="max-width: 100%; height: 60%;"> 
            <h2 class="tournament-title">{{ $match->tournament_name }}</h2>
            <p class="tournament-info"><strong>Game Type:</strong> {{ $match->game_name }}</p>
            <p class="tournament-info"><strong>Match Fee:</strong> {{ $match->match_fee }}</p>
            <p class="tournament-info"><strong>Winning Amount:</strong> {{ $match->winning_amount }}</p>
            <p class="tournament-info"><strong>Players Joined:</strong> {{ $match->players_joined }}/{{ $match->player_number }}</p>
            <p class="tournament-info"><strong>Date & Time:</strong> {{ $match->date_time }}</p>
            <div class="button">
                <a href="/details/{{$match->id}}" class="join-button"> See Details</a>
            </div>
        </div>
        @endforeach
    </div>

    <div class="paginate">
        {{ $matches->links() }}
    </div>
</body>
</html>
<style>
    .w-5.h-5{
        width: 20px;
    }
</style>