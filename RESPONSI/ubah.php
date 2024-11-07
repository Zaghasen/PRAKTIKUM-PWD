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

// ambil data di URL
$id = $_GET["id"];

$mhs = query("SELECT * FROM mahasiswa WHERE id = $id")[0];


// cek apakah tombol submit sudah ditekan atau belum
if (isset($_POST["simpan"])) {

    // cek apakah data berhasil diubah atau tidak
    if (ubah($_POST) > 0) {
        echo "
			<script>
				alert('data berhasil diubah!');
				document.location.href = 'editpage.php';
			</script>
		";
    } else {
        echo "
			<script>
				alert('data gagal diubah!');
				document.location.href = 'editpage.php';
			</script>
		";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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

    <div class="my-5">
        <div class="container ">

            <h1 class="text-center fw-bold title text-white">Edit Mahasiswa</h1>

            <div class="d-flex justify-content-center align-items-center">


                <!-- <div class="container"> -->
                <form class="col-6" method="post" action="">


                    <input type="number" class="form-control" value="<?= $mhs["id"] ?>" id="id" name="id" hidden>

                    <div class="mb-3">
                        <label for="nama" class="form-label text-white">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama" value="<?= $mhs["nama"]; ?>" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="nim" class="form-label text-white">NIM</label>
                        <input type="text" class="form-control" id="nim" name="nim" value="<?= $mhs["nim"]; ?>" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="jurusan" class="form-label text-white">Jurusan</label>
                        <input type="text" class="form-control" id="jurusan" name="jurusan" value="<?= $mhs["jurusan"]; ?>" aria-describedby="emailHelp">
                    </div>
                    <button type="submit" class="btn btn-primary" name="simpan">Edit</button>
                </form>
                <!-- </div> -->
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>