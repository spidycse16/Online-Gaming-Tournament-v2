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
        <button class="button" type="submit">Add Base</button>
    </form>
</body>
</html>