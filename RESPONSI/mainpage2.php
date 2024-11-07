<?php
session_start();
if (isset($_COOKIE['login']) && $_COOKIE['login'] == 'true') {
    $_SESSION['login'] = true;
}
if (!isset($_SESSION["login"])) {
    header("Location: login.php");
    exit;
}

require 'conn.php';
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

        .navbar-custom {
            background-color: rgba(0, 0, 0, 0.5);

        }

        body {
            background-image: url(img/gry.JPG);
            background-size: cover;
            background-position: center;
        }

        img {
            height: 350px;
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

            <a href="logout.php" type="button" class="btn btn-warning">LOGOUT</a>


        </div>
    </nav>

    <div class="container ">

        <div class=" d-flex justify-content-center align-items-center vh-100">
            <div class=" m-auto" style="width: 500px;">
                <h1 class="fw-bold mb-4 m-0 text-white">Hyosan University <br>of Science and Technology</h1>
                <p class="text-white">Halo, saat ini anda dapat mengakses halaman ini</p>
                <a href="input.php" type="button" class="btn btn-success">Input Mahasiswa</a>
                <a href="index.php" type="button" class="btn btn-success">Lihat Mahasiswa</a>
                <a href="editpage.php" type="button" class="btn btn-success">Edit Mahasiswa</a>
            </div>
            <div class="">
                <img src="img/1.jpg" alt="gambar" class="p-0 m-0">
            </div>
        </div>

    </div>



</body>

</html>