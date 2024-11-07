<?php
include 'koneksi.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $new_email = $_POST['new_email'];
    $new_password = $_POST['new_password'];
    $new_nama = $_POST['new_nama'];

    $check_query = "SELECT * FROM user WHERE email='$new_email'";
    $check_result = mysqli_query($koneksi, $check_query);

    if (mysqli_num_rows($check_result) > 0) {
        header("location: register.php?pesan=email-sudah-terdaftar");
        exit();
    }

    $insert_query = "INSERT INTO user (email, password, nama) VALUES ('$new_email', '$new_password', '$new_nama')";
    $insert_result = mysqli_query($koneksi, $insert_query);

    if ($insert_result) {
        $_SESSION['alert'] = "<div class='alert alert-success' role='alert'>Registrasi berhasil!</div>";
        header("location: login.php");
        exit();
    } else {
        header("location: register.php?pesan=gagal-registrasi");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="box">
        <div class="row justify-content-center">
            <div class="container">
                <div class="card-body">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <div class="mb-3">
                            <label for="new_email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="new_email" name="new_email" required>
                            <i class="bx bx-lock-alt"></i>
                        </div>
                        <div class="mb-3">
                            <label for="new_password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="new_password" name="new_password" required>
                            <i class="bx bx-lock-alt"></i>
                        </div>
                        <div class="mb-3">
                            <label for="new_nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="new_nama" name="new_nama" required>
                        </div>
                        <button type="submit" name="register" class="btn btn-primary">Register</button>
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