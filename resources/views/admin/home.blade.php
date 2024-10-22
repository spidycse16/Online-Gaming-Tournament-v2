<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{asset('css/admin.css')}}">
</head>
<body>
    @if(session('success'))
    <div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
        {{ session('success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    
    @endif
    <div class="admin">
        <h2>Admin Panel</h2>
    </div>
    <div class="options">
        <a href="/admin/add-tournament" class="add">Add Tournnament</a>
        <a href="/admin/edit-tournament" class="edit">Edit Tournnament</a>
        <a href="/admin//delete-tournament" class="delete">Delete tournament</a>
        <a href="/admin//add-coc-bases" class="add-coc">Add coc Base</a>
        <a href="/admin//add-cr-deck" class="add-cr">Add cr deck</a>
        <a href="/admin//handle users" class="handle">Handle Users</a>
        <form action="/logout" method="POST">
            @csrf
            <button type="submit" name="logout" class="logout">Logout</button>
    </form>
    </div>
 
</body>
</html>