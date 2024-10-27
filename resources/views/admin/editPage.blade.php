<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
    <title>Document</title>
</head>
<body>
    @if(session('failed'))
    <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
        {{ session('failed') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    
    @endif
    <form action="/admin/update-tournament/{{$tournaments->id}}" class="form-container" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <label for="">Tournament Name</label>
    <input type="text" class="field" name="name" value="{{$tournaments->tournament_name}}">

    <label for="">Match fee</label>
    <input type="text" class="field" name="match_fee" value="{{$tournaments->match_fee}}">

    <label for="datetime">Select Date and Time:</label>
    <input type="datetime-local" class="datetime" name="datetime" value="{{$tournaments->date_time}}">

    <label for="game_name">Game Name</label>
    <select id="game_name" class="dropdown" name="game_name" required>
        <option value="Clash Of Clans" {{ $tournaments->game_name == 'Clash Of Clans' ? 'selected' : '' }}>Clash of Clans</option>
        <option value="Clash Royale" {{ $tournaments->game_name == 'Clash Royale' ? 'selected' : '' }}>Clash Royale</option>
        <option value="FIFA" {{ $tournaments->game_name == 'FIFA' ? 'selected' : '' }}>FIFA</option>
        <option value="LUDO" {{ $tournaments->game_name == 'LUDO' ? 'selected' : '' }}>LUDO</option>
    </select>
    

    <label for="">Player Number</label>
    <select name="player_number" class="dropdown" required>
    <option value="32" {{$tournaments->player_number==32 ? 'selected' : ''}}>32</option>
    <option value="16" {{$tournaments->player_number==16 ? 'selected' : ''}}>16</option>
    <option value="8" {{$tournaments->player_number==8 ? 'selected' : ''}}>8</option>
        <option value="8">8</option>
    </select>

    <label for="">Winning Amount</label>
    <input type="text" class="field" name="winning_amount" value="{{$tournaments->winning_amount}}">

    <label for="Image">Image</label>
    <input type="file" class="image" name="image">
    
    <label for="">Description</label>
    <input type="textarea" class="description" name="description" row="4" value="{{$tournaments->description}}">
    
    <Button class="add-button" type="submit">Update</Button>

    </form>
</body>
</html>