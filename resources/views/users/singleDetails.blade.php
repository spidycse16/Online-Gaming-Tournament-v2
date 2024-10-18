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
            color:darkslategrey
            font-size: 2.5em;
            margin-bottom: 20px;
            font-family::content;

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
    </style>
    <div style="margin-left:180px;">
        @include('users.navbar')
    </div>
</head>
<body>

    <h1>Tournament Bracket</h1>
    <div class="bracket-container">
        @for ($i = 0; $i < $numberOfPlayers; $i += 2)
            <div class="match-box">
                @isset($player_name[$i])
                    <div class="player-box">{{ $player_name[$i] }}</div>
                @endisset
                <div class="vs-text">VS</div>
                @isset($player_name[$i + 1])
                    <div class="player-box">{{ $player_name[$i + 1] }}</div>
                @endisset
            </div>
        @endfor
    </div>
</body>
</html>
