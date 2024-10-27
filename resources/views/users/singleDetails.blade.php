<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
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

        .circle {
    width: 50px;     
    height: 50px;    
    border-radius: 50%;  
    background-color:lightslategray;
    color: white;        
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: bold;
    font-size: 12px;   
    margin-bottom: 4px;
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
      {{--Winner--}}
      @if($numberOfPlayers === 1)
      <div class="match-box">
          <div class="player-box winner-box">
              <strong>Winner:</strong> {{ $roundPlayers->first()->first()->user->name }}
          </div>
      </div>
      @else
    <div class="bracket-container">
        
        @foreach ($roundPlayers as $round => $players)
            @for ($i = 0; $i < count($players); $i += 2)
                @if (isset($players[$i]) && isset($players[$i + 1]))
                    <div class="match-box">
                        <div class="circle">
                            {{$round}}
                        </div>
                        <div class="player-box">{{ $players[$i]->user->name }}
                            
                        </div>
                        <div class="vs-text">VS</div>
                        <div class="player-box">{{ $players[$i + 1]->user->name }}
                        </div>
                    </div>
                @endif
            @endfor
        @endforeach

      
            @endif
    </div>
</body>
</html>
