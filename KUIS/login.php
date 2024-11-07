<?php
session_start();

$username = "root";
$password = "";
$host = "localhost";
$db = "YUPI";

$koneksi = mysqli_connect($host, $username, $password, $db);
if (!$koneksi) {
    die("TIDAK BISA TERKONEKSI KE DATABASE");
}

if (isset($_SESSION['email'])) {
    header("location: YUPI.php");
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
        header("location: YUPI.php");
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
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        Login
                    </div>
                    <div class="card-body">
                        <?php
                        if (isset($alert_message)) {
                            echo $alert_message;
                        }
                        ?>
                        <form action="login.php" method="POST">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="mb-3">
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

</body>

</html>