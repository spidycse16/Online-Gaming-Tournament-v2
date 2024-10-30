<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/coc.css')}}">
    <title>Document</title>
</head>
<body>
    @if(session('success'))
    <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
    <form action="/admin/add-base-control" method="POST" enctype="multipart/form-data">
        @csrf
        <label for="">Title</label>
        <input type="text" class="field" name="title">
        <label for="">Image</label>
        <input type="file" class="field" name="image">
        <label for="">Desciption</label>
        <input type="text" class="field" name="description">
        <div class="checkbox">
            <label for="">Tags</label>

            <input type="checkbox" name="tags[]" value="cwl base"> Cwl Base
            <input type="checkbox" name="tags[]" value="anti star"> Anti star
            <input type="checkbox" name="tags[]" value="anti 2 star"> Anti 2 star
            <input type="checkbox" name="tags[]" value="farming"> Farming
            <input type="checkbox" name="tags[]" value="trophy"> Trophy
            <input type="checkbox" name="tags[]" value="hybrid"> Hybrid
            <input type="checkbox" name="tags[]" value="anti 3 star"> Anti 3 star
            <input type="checkbox" name="tags[]" value="anti air"> Anti air<br>
            <input type="checkbox" name="tags[]" value="compact base"> Compact base
            <input type="checkbox" name="tags[]" value="island base"> Island Base
        </div>
       <div class="dropdown">
        <label for="game_name">Th level</label>
        <select id="game_name" class="dropdown" name="th_level" required>
            <option value="Th16">Th16</option>
            <option value="Th15">Th15</option>
            <option value="Th14">Th14</option>
            <option value="Th13">Th13</option>
            <option value="Th12">Th12</option>
            <option value="Th11">Th11</option>
            <option value="Th10">Th10</option>
            <option value="Th9">Th9</option>
            <option value="Th8">Th8</option>
            <option value="Th7">Th7</option>
            <option value="Th6">Th6</option>
            <option value="Th5">Th5</option>
            <option value="Th4">Th4</option>
            <option value="Th3">Th3</option>
        </select>
       </div>
       <label for="">Base link</label>
        <input type="text" class="field" name="link">
        <button class="button" type="submit">Add Base</button>
    </form>
</body>
</html>