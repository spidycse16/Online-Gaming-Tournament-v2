<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>All Tournaments</title>
    <link rel="stylesheet" href="{{ asset('css/tournament.css') }}">
    <div style="margin-left:180px;">
        @include('users.navbar')
    </div>
</head>
<body>
    @if (session('alreadyJoined'))
    <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
        {{ session('alreadyJoined') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
@if (session('nospace'))
    <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
        {{ session('nospace') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif
    <div class="tournament-container">
        @foreach ($tournaments as $tournament)
        <div class="tournament-details">
            <img src="{{ asset($tournament->image) }}" alt="Tournament Image" style="max-width: 100%; height: 60%;">            <h2 class="tournament-title">{{ $tournament->tournament_name }}</h2>
            <p class="tournament-info"><strong>Game Type:</strong> {{ $tournament->game_name }}</p>
            <p class="tournament-info"><strong>Match Fee:</strong> {{ $tournament->match_fee }}</p>
            <p class="tournament-info"><strong>Winning Amount:</strong> {{ $tournament->winning_amount }}</p>
            <p class="tournament-info"><strong>Players Joined:</strong> {{ $tournament->players_joined }}/{{ $tournament->player_number }}</p>
            <p class="tournament-info"><strong>Date & Time:</strong> {{ $tournament->date_time }}</p>
            <div class="button">
                <a href="/tournament-details/{{$tournament->id}}" class="join-button"> See Details</a>
            </div>
        </div>
        @endforeach
    </div>

    <div class="paginate">
        {{ $tournaments->links() }}
    </div>
</body>
</html>
<style>
    .w-5.h-5{
        width: 20px;
    }
</style>