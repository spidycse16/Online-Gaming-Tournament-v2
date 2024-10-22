<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <title>Document</title>
</head>
<body>
    <form action="/admin/add-tournament-form" class="form-container" method="POST" enctype="multipart/form-data">
    @csrf
    <label for="">Tournament Name</label>
    <input type="text" class="field" name="name">

    <label for="">Match fee</label>
    <input type="text" class="field" name="match_fee">

    <label for="datetime">Select Date and Time:</label>
    <input type="datetime-local" class="datetime" name="datetime">

    <label for="game_name">Game Name</label>
    <select id="game_name" class="dropdown" name="game_name" required>
        <option value="Clash Of clans">Clash of Clan</option>
        <option value="Clash Royale">Clash Royale</option>
        <option value="FIFA">FIFA</option>
        <option value="LUDO">LUDO</option>
    </select>

    <label for="">Player Number</label>
    <select name="player_number" class="dropdown">
    <option value="32">32</option>
        <option value="16">16</option>
        <option value="8">8</option>
    </select>

    <label for="">Winning Amount</label>
    <input type="text" class="field" name="winning_amount">

    <label for="Image">Image</label>
    <input type="file" class="image" name="image">
    
    <label for="">Description</label>
    <input type="textarea" class="description" name="description" row="4">
    
    <Button class="add-button" type="submit">Add Tournament</Button>

    </form>
</body>
</html>