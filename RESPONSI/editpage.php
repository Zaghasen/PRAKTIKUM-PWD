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
$mahasiswa = query("SELECT * FROM mahasiswa");


if (isset($_POST["simpan"])) {

    // cek apakah data berhasil di tambahkan atau tidak
    if (tambah($_POST) > 0) {
        echo "
			<script>
				alert('data berhasil simpan!');
				document.location.href = 'index.php';
			</script>
		";
    } else {
        echo "
			<script>
				alert('data gagal simpan!');
				document.location.href = 'index.php';
			</script>
		";
    }
}


?>
<!DOCTYPE html>
<html>

<head>
    <title>Daftar mahasiswa</title>
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

            <a href="
            <?php
            if (isset($_SESSION["login"])) {
                echo "mainpage2.php";
            } else {
                echo "mainpage.php";
            }
            ?>
            " type="button" class="btn btn-warning">HOME</a>


        </div>
    </nav>
    <div class="my-5">
        <div class="container ">

            <h1 class="text-center fw-bold title text-white"> Data Mahasiswa</h1>


            <br>

            <div class="col-12 justify-content-center">

                <div class="card m-2 shadow-lg mb-5 rounded">

                    <div class="card-body bg-transparent">

                        <table class="table table-striped bg-white" id="mhs">

                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th class="text-center">Nama</th>

                                    <th class="text-start">NIM</th>
                                    <th class="text-start">Jurusan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i = 1; ?>
                                <?php foreach ($mahasiswa as $row) : ?>
                                    <tr>
                                        <td class="text-center"><?= $i; ?></td>
                                        <td class="text-start"><?= $row["nama"]; ?></td>
                                        <td class="text-start"><?= $row["nim"]; ?></td>
                                        <td class="text-start"><?= $row["jurusan"]; ?></td>
                                        <td>
                                            <a href="ubah.php?id=<?= $row["id"]; ?>" class="btn btn-warning">
                                                Edit
                                            </a>

                                            <a href="hapus.php?id=<?= $row["id"]; ?>" onclick="return confirm('Apakah Anda Yakin?');" class="btn btn-danger">
                                                Delete
                                            </a>
                                        </td>

                                    </tr>
                                    <?php $i++; ?>
                                <?php endforeach; ?>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.1.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/2.0.2/js/dataTables.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/2.0.2/js/dataTables.bootstrap5.js"></script>
    <script>
        $(document).ready(function() {
            $('#mhs').dataTable({
                "pageLength": 5
            });
        });
    </script>

</body>

</html>