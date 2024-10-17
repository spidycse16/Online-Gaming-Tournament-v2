<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .btn {
    display: inline-block;           /* Allow padding and margins to be respected */
    padding: 8px 16px;             /* Add padding for better touch targets */
    background-color:chocolate     /* Primary button color */
    color: #fff;                    /* Text color */
    border: 2px solid #007BFF;      /* Border to match the background */
    border-radius: 2px;             /* Rounded corners */
    text-align: center;              /* Center the text */
    text-decoration: none;           /* Remove underline */
    font-size: 16px;                 /* Font size */
    font-weight: bold;               /* Make the text bold */
    cursor: pointer;                 /* Change cursor on hover */
    transition: background-color 0.3s, color 0.3s, border-color 0.3s; /* Smooth transition */
    margin: 20px auto;              /* Center the button and add some margin */
    width: 100px;                    /* Fixed width for better alignment */
}

.btn:hover {
    background-color:chartreuse;      /* Darker shade on hover */
    border-color:blueviolet     /* Change border color on hover */
    color: #fff;                    /* Keep text color white */
    transform: translateY(-2px);    /* Slight upward movement */
}

.btn:active {
    transform: translateY(1px);      /* Move down slightly when active */
}
    </style>
</head>
<body>
    @if (session('success'))
    <div class="alert alert-success" style="text-align: center">
        {{ session('success') }}
    </div>
@endif
    <p style="animation-direction:normal; font-family:Verdana, Geneva, Tahoma, sans-serif; text-align:center; font-size:large;color:darkgrey ; margin-top:200px;">Welcome to login page</p>
    <div>
        <form action="/login-control" method="POST">
            @csrf
            <div style="text-align:center; font-family:Impact, Haettenschweiler, 'Arial Narrow Bold', sans-serif">
                <label for="">Email</label><br>
        <input type="text" name="email" required> <!-- Add name attributes -->
        <br>
        <label for="">Password</label><br>
        <input type="password" name="password" required> <!-- Use password input type -->
            </div>
            <div style="text-align: center;">

                <button class="btn" style="align-items:center">Login</button>
            </div>
        </form>
        <div style="text-align: center">
            <label style="font-family: Arial, Helvetica, sans-serif">Dont have an Account?</label>
        <a href="/register" style="text-decoration: none ">Create Now</a>
        </div>
        
    </div>
</body>
</html>
