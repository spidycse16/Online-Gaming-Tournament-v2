<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Welcome</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: #e3f2fd;
        }


        .container {
            text-align: center;
            padding: 20px;
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 90%;
            animation: fadeIn 0.6s ease-in-out;
        }

        .logo {
            width: 100%;
            max-width: 400px;
            height: auto;
            margin-bottom: 20px;
            border-radius: 4px;
        }

        h2 {
            color: #512da8;
            font-size: 1.8rem;
            margin-bottom: 1.2rem;
            font-family: 'Trebuchet MS', 'Lucida Sans Unicode', Arial, sans-serif;
        }

        p {
            font-size: 1.1rem;
            color: #616161;
            margin-bottom: 1rem;
        }

        .btn {
            display: inline-block;
            padding: 10px 20px;
            margin: 10px;
            font-size: 1rem;
            font-weight: bold;
            color: #fff;
            background-color: #1976d2;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            text-decoration: none;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #1565c0;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>
<body>
    <div class="container">
        <img src="{{ asset('images/welcomelogo.jpg') }}" alt="Welcome" class="logo">
        <h2>Welcome to AppName</h2>
        
        <p>Already have an account?</p>
        <a href="/login" class="btn">Login</a>

        <p>Don't have an account yet?</p>
        <a href="/register" class="btn" style="background-color: #43a047;">Sign Up</a>
    </div>
</body>
</html>
