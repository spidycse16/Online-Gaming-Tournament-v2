<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            margin-top: 100px;
        }

        form {
            text-align: center;
            width: 300px;
        }

        label, input, button {
            display: block;
            width: 100%;
            margin: 10px 0;
        }

        input {
            padding: 10px;
            font-size: 16px;
        }

        button {
            padding: 10px;
            font-size: 16px;
            background-color: #4CAF50;
            color: white;
            width :320px;
            cursor: pointer;
        }

        button:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <form action="/admin/manage" method="get">
        @csrf
        <label for="" style="font-size: large; font-family:Arial, Helvetica, sans-serif;">Name of The Tournament</label>
        <input type="text" name="title">
        <button type="submit">Search</button>
    </form>
</body>
</html>
