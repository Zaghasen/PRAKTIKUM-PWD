<?php
include 'koneksi.php';
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['register'])) {
    $new_email = $_POST['new_email'];
    $new_password = $_POST['new_password'];
    $new_nama = $_POST['new_nama'];

    $check_query = "SELECT * FROM user WHERE email='$new_email'";
    $check_result = mysqli_query($koneksi, $check_query);

    if(mysqli_num_rows($check_result) > 0) {
        header("location: register.php?pesan=email-sudah-terdaftar");
        exit();
    }

    $insert_query = "INSERT INTO user (email, password, nama) VALUES ('$new_email', '$new_password', '$new_nama')";
    $insert_result = mysqli_query($koneksi, $insert_query);

    if($insert_result) {
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
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    Register
                </div>
                <div class="card-body">
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <div class="mb-3">
                            <label for="new_email" class="form-label">Email</label>
                            <input type="email" class="form-control" id="new_email" name="new_email" required>
                        </div>
                        <div class="mb-3">
                            <label for="new_password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="new_password" name="new_password" required>
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

</body>
</html>
