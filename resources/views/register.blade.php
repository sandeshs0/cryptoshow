<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Page</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-image: url('image//bg.jpg');
            background-size: cover;
            background-position: center;
        }

        form {
            width: 90%;
            max-width: 400px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: rgba(255, 255, 255, 0.8); 
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: #fff;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }

        .register-link {
            text-align: center;
            margin-top: 10px;
        }

        .register-link a {
            color: #007bff;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<!-- register.blade.php -->
<form action="{{ route('register') }}" method="post">
    @csrf
    <h2>Registration</h2>
    <input type="text" name="name" placeholder="Name" required>
    <input type="text" name="user_nickname" placeholder="Nickname"> <!-- Added nickname field -->
    <input type="email" name="email" placeholder="Email" required>
    <input type="password" name="password" placeholder="Password" required>
    <input type="password" name="password_confirmation" placeholder="Confirm Password" required>
    <input type="submit" value="Register">
    <div class="register-link">
        <span>Already registered? <a href="/login">Click here to login</a></span>
    </div>
</form>


</body>
</html>

<?php

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//     $name = $_POST['name'];
//     $email = $_POST['email'];
//     $password = $_POST['password'];

//     $hashed_password = password_hash($password, PASSWORD_DEFAULT);
//     $sql = "INSERT INTO users (name, email, password) VALUES ('$name', '$email', '$hashed_password')";
    
//     if (mysqli_query($conn, $sql)) {
//         echo "Registration successful!";
//         header("Location: login.html");
//         exit();
//     } else {
//         echo "Error: " . $sql . "<br>" . mysqli_error($conn);
//     }
// }
// ?>