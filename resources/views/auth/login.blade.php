<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Page</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(to right, #e8eaf6, #c5cae9);
        }


        .container {
            width: 100%;
            max-width: 400px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
            padding: 2rem;
            text-align: center;
            animation: fadeIn 0.8s ease-in-out;
        }

        .container h2 {
            font-size: 1.8rem;
            color: #424242;
            margin-bottom: 1.5rem;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 12px;
            margin: 0.8rem 0;
            border: 1px solid #b0bec5;
            border-radius: 4px;
            font-size: 1rem;
        }


        .btn {
            display: inline-block;
            padding: 10px 24px;
            background-color: #1976d2;
            color: #fff;
            border: none;
            border-radius: 4px;
            font-size: 1rem;
            cursor: pointer;
            transition: background-color 0.3s;
            font-weight: bold;
        }

        .btn:hover {
            background-color: #0d47a1;
        }


        .register {
            margin-top: 1rem;
            font-size: 0.9rem;
            color: #455a64;
        }

        .register a {
            color: #1976d2;
            text-decoration: none;
        }

        .alert {
            font-size: 0.9rem;
            padding: 10px;
            color: #2e7d32;
            background-color: #c8e6c9;
            border-radius: 4px;
            margin-bottom: 1rem;
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
    </style>
</head>
<body>
    <div class="container">
        @if (session('success'))
            <div class="alert">
                {{ session('success') }}
            </div>
        @endif
        <h2>Welcome Back</h2>
        <form action="/login-control" method="POST">
            @csrf
            <label for="email">Email</label><br>
            <input type="text" id="email" name="email" placeholder="Enter your email" required><br>

            <label for="password">Password</label><br>
            <input type="password" id="password" name="password" placeholder="Enter your password" required><br>

            <button type="submit" class="btn">Login</button>
        </form>
        <div class="register">
            <p>Don't have an account? <a href="/register">Create Now</a></p>
        </div>
    </div>
</body>
</html>
