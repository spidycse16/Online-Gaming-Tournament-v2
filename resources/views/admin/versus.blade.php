<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tournament Bracket</title>
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        h1 {
            text-align: center;
            color:darkslategrey;
            font-size: 2.5em;
            margin-bottom: 20px;
            font-family:'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;

        }
        .bracket-container {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
            max-width: 800px;
            margin: 0 auto;
        }
        .match-box {
            background-color:darkseagreen;
            border: 1px solid #ddd;
            border-radius: 8px;
            padding: 20px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease;
            display: flex;
            flex-direction: column;
            justify-content: space-between;
        }
        .match-box:hover {
            transform: translateY(-5px);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .player-box {
            padding: 15px;
            background-color: #e9ecef;
            border-radius: 6px;
            margin-bottom: 5px;
            font-weight: bold;
            font-size: 1.2em;
            text-align: center;
        }
        .vs-text {
            font-size: 1.5em;
            color: #666;
            text-align: center;
            margin: 10px 0;

        }
        @media (max-width: 768px) {
            .bracket-container {
                grid-template-columns: 1fr;
            }
        }
        .looser{
            background-color: red;
        }
    </style>
</head>
<body>

    <h1>Tournament Bracket</h1>

    {{-- Check for Winner --}}
    @if($numberOfPlayers === 1)
        <div class="match-box">
            <div class="player-box winner-box">
                <strong>Winner:</strong> {{ $roundPlayers->first()->first()->user->name  }}
            </div>
        </div>
    @else
        {{-- Tournament Bracket Display --}}
        <div class="bracket-container">
            @foreach ($roundPlayers as $round => $roundPlayers)
                <h2>Round {{ $round }}</h2>
                @for ($i = 0; $i < count($roundPlayers); $i += 2)
                    @if (isset($roundPlayers[$i]) && isset($roundPlayers[$i + 1]))
                        <div class="match-box">
                            <div class="player-box">{{ $roundPlayers[$i]->user->name }}
                                <form action="/admin/eliminate-user/{{ $roundPlayers[$i]->user_id }}/advance/{{ $roundPlayers[$i + 1]->user_id }}/tournament/{{ $tournament_id }}" method="POST">
                                    @csrf
                                    <button type="submit" class="looser">Looser</button>
                                </form>
                            </div>
                            <div class="vs-text">VS</div>
                            <div class="player-box">{{ $roundPlayers[$i + 1]->user->name }}
                                <form action="/admin/eliminate-user/{{ $roundPlayers[$i + 1]->user_id }}/advance/{{ $roundPlayers[$i]->user_id }}/tournament/{{ $tournament_id }}" method="POST">
                                    @csrf
                                    <button type="submit" class="looser">Looser</button>
                                </form>
                            </div>
                        </div>
                    @endif
                @endfor
            @endforeach
        </div>
    @endif

</body>
</html>