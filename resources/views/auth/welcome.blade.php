<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
</head>
<body style="background:lightblue">
    <div style="text-align: center">
        <img src="{{asset('images/welcomelogo.jpg')}}" alt="welcome" style="height: 200px; width:800px;">
    </div>
    <h2 style="text-align: center; margin-bottom: 20px; color:blueviolet ; font-family:'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif">Welcome to appname</h2>
    <div style="text-align: center;">
        <p style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif font-size:large">Already Have accout?</p>
        <a href="/login" style="border:2px,solid; padding:8px; font-family:'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif">Login</a>
    </div>
    <div style="text-align: center; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif">
        <p style="font-size: large;">Dont have an account?</p>
        <a href="/register" style="padding: 8px ; border:2px,solid;">Sign Up</a>
    </div>
</body>
</html>