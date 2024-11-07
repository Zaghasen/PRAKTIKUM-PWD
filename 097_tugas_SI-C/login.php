<?php
session_start();

$username = "root";
$password = "";
$host = "localhost";
$db = "apotik";

$koneksi = mysqli_connect($host, $username, $password, $db);
if (!$koneksi) {
    die("TIDAK BISA TERKONEKSI KE DATABASE");
}

if (isset($_SESSION['email'])) {
    header("location: obat.php");
    exit();
}

if (isset($_SESSION['alert'])) {
    $alert_message = $_SESSION['alert'];
    unset($_SESSION['alert']);
}

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $email = mysqli_real_escape_string($koneksi, $email);
    $password = mysqli_real_escape_string($koneksi, $password);

    $query = "SELECT * FROM user WHERE email='$email' AND password='$password'";
    $result = mysqli_query($koneksi, $query);

    if (mysqli_num_rows($result) == 1) {
        $_SESSION['email'] = $email;
        header("location: obat.php");
        exit();
    } else {
        $_SESSION['alert'] = "<div class='alert alert-danger' role='alert'>Login gagal! Email atau password salah.</div>";
        header("location: login.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="box">
        <div class="container">
            <div class="top-header">
                <i class="bx bx-user"></i>
                <div class="input-field">
                    <span></span>

                </div>
                <div class="card-body">
                    <?php
                    if (isset($alert_message)) {
                        echo $alert_message;
                    }
                    ?>
                    <form action="login.php" method="POST">
                        <div class="input-field">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="email" name="email">
                            <i class="bx bx-lock-alt"></i>
                        </div>
                        <div class="input-field">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <button type="submit" name="login" class="btn btn-primary">Login</button>
                        <a href="register.php" class="btn btn-success">Register</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
    <style>
        body {
            background-color: whitesmoke;
            background-image: url("bg1.jpg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            font-family: 'Poppins', sans-serif;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #6c757d;
            color: black;
            border-radius: 15px 15px 0 0;
        }

        .form-label {
            color: white;
        }

        .card-footer {
            background-color: black;
            border-top: none;
        }

        .input-field .input {
            height: 30px;
            width: 87%;
            border: none;
            border-radius: 30px;
            color: #fff;
            padding: 0 0 0 42px;
            background: rgba(255, 255, 255, 0.1);
        }

        i {
            position: relative;
            top: -31px;
            left: 17px;
            color: #fff;
        }

        ::-webkit-input-placeholder {
            color: #fff;
        }

        span {
            color: #fff;
            font-size: 30px;
            display: flex;
            justify-content: center;
            padding: 0 0 15px 0;
        }

        .input-field {
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
        }

        .box {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 90vh;
        }

        .container {
            width: 350px;
            display: flex;
            flex-direction: column;
            padding: 0 15px 0 15px
        }

        .submit {
            border: none;
            border-radius: 30px;
            font-size: 15px;
            height: 50px;
            outline: none;
            width: 100%;
            background: rgba(255, 255, 255, 0.7);
            cursor: pointer;
            transition: .3s;
        }

        .submit:hover {
            box-shadow: 1px 5px 7px 1px rgba(0, 0, 0, 0.2);
        }

        .bottom {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            font-size: small;
            color: #fff;
            margin-top: 10px;
        }

        .left {
            display: flex;
        }

        label a {
            color: #fff;
            text-decoration: none;
        }
    </style>

</body>

</html>