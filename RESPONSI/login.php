<?php
session_start();
require 'conn.php';

$error = false;

if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    $result = mysqli_query($conn, "SELECT username FROM user WHERE id = $id");
    $row = mysqli_fetch_assoc($result);


    if ($key === hash('sha256', $row['username'])) {
        $_SESSION['login'] = true;
    }
}

if (isset($_SESSION["login"])) {
    header("Location: mainpage.php");
    exit;
}

if (isset($_POST["login"])) {

    $username = $_POST["username"];
    $password = $_POST["password"];

    echo $username;
    echo $password;

    $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

    // cek username
    if (mysqli_num_rows($result) === 1) {
        echo "username ada";
        // cek password
        $row = mysqli_fetch_assoc($result);
        echo $row["password"];
        if (password_verify($password, $row["password"])) {
            $_SESSION["login"] = true;

            // cek remember me
            if (isset($_POST["remember"])) {
                // buat cookie
                setcookie('id', $row['id'], time() + 60);
                setcookie('key', hash('sha256', $row['username']), time() + 60);

                // setcookie('login', 'true', time()+60);
            }
            header("Location: mainpage2.php");
            exit;
        }
    }

    $error = true;
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>HYOSAN UNIVERSITY</title>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/2.0.2/css/dataTables.bootstrap5.css">
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=DM+Sans:ital,opsz,wght@0,9..40,100..1000;1,9..40,100..1000&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'DM Sans', sans-serif;
            /* background-color: #ecc6ff; */
            opacity: 1;

            /* background: linear-gradient(135deg, #fefcff55 25%, transparent 25%) -12px 0/ 24px 24px, linear-gradient(225deg, #fefcff 25%, transparent 25%) -12px 0/ 24px 24px, linear-gradient(315deg, #fefcff55 25%, transparent 25%) 0px 0/ 24px 24px, linear-gradient(45deg, #fefcff 25%, #ecc6ff 25%) 0px 0/ 24px 24px; */
        }

        body {
            background-image: url(img/gry.JPG);
            background-size: cover;
            background-position: center;
        }

        .shadow-lg {
            box-shadow: 0 0 10px rgba(0, 0, 255, 0.5);
        }

        .title {
            font-size: 50px;
        }

        .navbar-custom {
            background-color: rgba(0, 0, 0, 0.5);

        }
    </style>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-custom">
        <div class="container-fluid mx-5">
            <div>
                <img src="img/hyosan.PNG" style="width: 50px; height:50px;" alt="">
                <a class="navbar-brand text-white mx-5" href="">HYOSAN UNIVERSITY</a>
            </div>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <a href="mainpage.php" type="button" class="btn btn-warning">HOME</a>


        </div>
    </nav>
    <div class="my-5 ">
        <div class="container ">

            <h1 class="text-center fw-bold title text-white">Login</h1>

            <div class="d-flex justify-content-center align-items-center">


                <!-- <div class="container"> -->
                <form class="col-6" method="post" action="">
                    <?php
                    if ($error == true) {


                        echo "
                        <script>
                            alert('email atau password salah!');
                           
                        </script>
		";
                    }
                    ?>
                    <div class="mb-3">

                        <label for="username" class="form-label text-white mt-5">Username</label>
                        <input type="text" name="username" id="username" class="form-control">
                    </div>

                    <div class="mb-3">

                        <label for="password" class="form-label text-white">Password</label>
                        <input type="password" name="password" id="password" class="form-control">
                    </div>


                    <div class="mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="remember" id="remember">
                            <label class="form-check-label text-white" for="remember">
                                Remember Me
                            </label>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary" name="login">Login</button>
                </form>
                <!-- </div> -->
            </div>
        </div>
    </div>





</body>

</html>