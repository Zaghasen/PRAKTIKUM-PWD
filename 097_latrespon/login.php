<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <style>
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            background-color: #f0f0f0;
        }

        .container {
            display: flex;
            width: 80%;
            height: 500px;
            max-width: 2500px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .image-section {
            flex: 1;
            background: url('warehouse.jpeg') no-repeat center center;
            background-size: cover;
        }

        .login-section {
            flex: 1;
            padding: 40px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
        }

        .login-section h2 {
            margin-bottom: 20px;
        }

        .login-section .error {
            color: red;
            margin-bottom: 20px;
        }

        .login-section input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .login-section button {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        .login-section button:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="image-section"></div>
        <div class="login-section">
            <h2>LOGIN</h2>
            <form action="loginp.php" method="post">

                <input type="username" name="username" placeholder="username" required>
                <input type="password" name="password" placeholder="password" required>
                <button type="submit" class="btn">login</button>
            </form>
        </div>
    </div>
</body>

</html>