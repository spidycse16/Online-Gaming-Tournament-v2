<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Tournament Details</title>
    <style>
        /* Basic reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            padding: 20px;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            background-color: #fff;
            padding: 20px;
            border: 1px solid #ddd;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }

        .tournament-card img {
            width: 100%;
            height: auto;
            border-radius: 8px;
            margin-bottom: 20px;
        }

        .details {
            margin-bottom: 20px;
            text-align: left;
        }

        .details p {
            margin-bottom: 10px;
            font-size: 1.1em;
            color: #333;
        }

        .details strong {
            font-weight: bold;
            color: #555;
        }

        .text-muted {
            color: #999;
            font-size: 0.9em;
        }

        /* Responsive Design */
        @media (max-width: 600px) {
            .container {
                padding: 10px;
            }

            h1 {
                font-size: 1.5em;
            }

            .details p {
                font-size: 1em;
            }
        }
    </style>
    <div style="margin-left:180px;">
        @include('users.navbar')
    </div>
</head>
<body>

<div class="container">
    <h1><strong></strong> {{$tournament->tournament_name}}</h1>
    <div class="tournament-card">
        <img src="{{asset($tournament->image)}}" alt="Tournament Image">
        <div class="details">
            
            <p><strong>Match Fee:</strong> {{$tournament->match_fee}}</p>
            <p><strong>Date & Time:</strong> {{$tournament->date_time}}</p>
            <p><strong>Game Name:</strong> {{$tournament->game_name}}</p>
            <p><strong>Player Number:</strong> {{$tournament->player_number}}</p>
            <p><strong>Winning Amount:</strong> {{$tournament->winning_amount}}</p>
            <p><strong>Players Joined:</strong> {{$tournament->players_joined}}</p>
            <p style="margin-bottom: 20px;"><strong>Description:</strong> {{$tournament->description}}</p>
            <a href="/payment/{{$tournament->id}}" class="join-button">Join Now</a>
        </div>
    </div>
</div>

</body>
</html>
<style>
    .join-button {
    background-color:#999;
    text-decoration: none;
    color:lavender;
    border: 2px solid;
    padding: 10px 40px;
    border-radius: 5px;
    cursor: pointer;
    text-decoration: none;
    align-items: center;
    margin: 300px;
    margin-top: 10px;
}
</style>