<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Form</title>
    <style>
        body {
            font-family: Arial, sans-serif; /* Set a basic font */
            background-color: #f4f4f4; /* Light background color */
            display: flex; /* Center form horizontally and vertically */
            justify-content: center;
            align-items: center;
            height: 100vh; /* Full height */
            margin: 0; /* Remove default margin */
        }
        .form-container {
            background: white; /* White background for form */
            padding: 20px; /* Padding inside form */
            border-radius: 5px; /* Rounded corners */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1); /* Shadow effect */
            width: 500px; /* Fixed width */
        }
        .form-container h2 {
            text-align: center; /* Center form title */
            margin-bottom: 20px; /* Space below title */
        }
        .form-group {
            margin-bottom: 15px; /* Space between fields */
        }
        .form-group label {
            display: block; /* Make label take full width */
            margin-bottom: 5px; /* Space below label */
        }
        .form-group input {
            width: 80%; /* Full width input */
            padding: 10px; /* Padding inside input */
            border: 1px solid #ccc; /* Light border */
            border-radius: 3px; /* Slightly rounded corners */
        }
        .form-group button {
            width: 100%; /* Full width button */
            padding: 10px; /* Padding inside button */
            background-color: #007BFF; /* Button color */
            color: white; /* Text color */
            border: none; /* No border */
            border-radius: 3px; /* Slightly rounded corners */
            cursor: pointer; /* Change cursor to pointer */
            font-size: 16px; /* Font size */
            transition: background-color 0.3s; /* Smooth transition */
        }
        .form-group button:hover {
            background-color: #0056b3; /* Darker shade on hover */
        }
    </style>
</head>
<body>


    <div class="form-container">
        <h2>Register</h2>
        <form action="/register-control" method="POST">
            @csrf <!-- CSRF token for security -->
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <button type="submit">Register</button>
            </div>
        </form>
    </div>
</body>
</html>
