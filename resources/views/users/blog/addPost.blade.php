<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/addPost.css')}}">
    <title>Add Post</title>
</head>
<body>
    <form action="/add-post-control" method="POSt" enctype="multipart/form-data">
        @csrf
        <label for="">Title</label>
        <input type="text" name="title" class="field">
        
        <label for="">description</label>
        <input type="textarea" name="description" class="field">
        
        <label for="">Image</label>
        <input type="file" name="image" class="field">
        
        <button type="submit" class="add-button">Add Post</button>
    </form>
    
    
</body>
</html>