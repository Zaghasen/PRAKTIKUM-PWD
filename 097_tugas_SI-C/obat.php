<?php

$hostname = "localhost"; //hostname
$username = "root";      //username untuk login ke mysql
$password = "";          //password untuk login ke mysql
$database = "apotik";    //nama database
$konek = new mysqli($hostname, $username, $password, $database);

if ($konek->connect_error) {
    die('Maaf koneksi gagal: ' . $konek->connect_error);
}

// Inisialisasi variabel
$Nama = "";
$Kadaluarsa = "";
$Jenis = "";
$KodeObat = "";
$Dosis = "";
$Stok = "";
$Harga = "";
$EfekSamping = "";
$sukses = "";
$error = "";


if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = "";
}

if ($op == 'delete') {
    $id = $_GET['id'];
    $sql1 = "DELETE FROM obat WHERE id ='$id'";
    $q1 = mysqli_query($konek, $sql1);
    if ($q1) {
        $sukses = "Data berhasil dihapus";
    } else {
        $error = "Data gagal dihapus";
    }
}

if ($op == 'edit') {
    $id = $_GET['id'];
    $sql1 = "SELECT * FROM obat WHERE id = '$id'";
    $q1 = mysqli_query($konek, $sql1);
    if ($q1) {
        $r1 = mysqli_fetch_array($q1);
        $Nama = $r1['nama'];
        $Kadaluarsa = $r1['kadaluarsa'];
        $Jenis = $r1['jenis'];
        $KodeObat = $r1['kode_obat'];
        $Dosis = $r1['dosis'];
        $Stok = $r1['stok'];
        $Harga = $r1['harga'];
        $EfekSamping = $r1['efek_samping'];
    }
}

if (isset($_POST['simpan'])) {
    $Nama = $_POST['Nama'];
    $Kadaluarsa = $_POST['Kadaluarsa'];
    $Jenis = $_POST['Jenis'];
    $KodeObat = $_POST['kode_obat'];
    $Dosis = $_POST['dosis'];
    $Stok = $_POST['stok'];
    $Harga = $_POST['harga'];
    $EfekSamping = $_POST['efek_samping'];

    if ($Nama && $Kadaluarsa && $Jenis && $KodeObat && $Dosis && $Stok && $Harga && $EfekSamping) {
        if ($op == 'edit') { //untuk update
            $sql1 = "UPDATE obat SET nama = '$Nama', kadaluarsa = '$Kadaluarsa', jenis = '$Jenis', kode_obat = '$KodeObat', dosis = '$Dosis', stok = '$Stok', harga = '$Harga', efek_samping = '$EfekSamping' WHERE id = '$id'";
            $q1 = mysqli_query($konek, $sql1);
            if ($q1) {
                $sukses = "Data berhasil diubah";
            } else {
                $error = "Data gagal diubah";
            }
        } else { //untuk insert
            $sql1 = "INSERT INTO obat (nama, kadaluarsa, jenis, kode_obat, dosis, stok, harga, efek_samping) VALUES ('$Nama', '$Kadaluarsa', '$Jenis', '$KodeObat', '$Dosis', '$Stok', '$Harga', '$EfekSamping')";
            $q1 = mysqli_query($konek, $sql1);
            if ($q1) {
                $sukses = "Berhasil memasukkan data baru";
            } else {
                $error = "Gagal memasukkan data baru";
            }
        }
    } else {
        $error = "Silahkan masukkan semua data";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Obat</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body id="home">
    <nav class="navbar navbar-expand-lg shadow-sm fixed-top" style="background-color: white;">
        <div class="container">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#home"></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about"></a>
                    </li>
                    <?php
                    session_start();
                    if (isset($_SESSION['email'])) {
                        echo '<li class="nav-item">
                            <a class="nav-link">Hello, ' . $_SESSION['email'] . '</a>
                        </li>
                        <li class="nav-item">
                            <a href="logout.php" class="btn btn-danger">Logout</a>
                        </li>';
                    } else {
                        echo '<li>
                            <a href="login.php" class="btn btn-primary">Login</a>
                        </li>';
                    }
                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <section class="jumbotron text-center">
        <img src="" alt="" width="500" class="rounded-circle img-thumbnail mt-3" style="background-color: white;">
    </section>

    <section id="projek">
        <div class="container">
            <div class="row text-center mb-3">
                <div class="col">
                    <h2></h2>
                </div>
            </div>

            <div class="max-auto">
                <!-- untuk memasukkan data  -->
                <div class="card">
                    <div class="card-header text-white bg-secondary">
                        Form Pendataan Obat
                    </div>
                    <div class="card-body">
                        <?php
                        if ($error) {
                            ?>
                            <div class="alert alert-danger" role="alert">
                                <?php echo $error; ?>
                            </div>
                            <?php
                            header("refresh:5;url=obat.php"); // 5=detik
                        }
                        ?>
                        <?php
                        if ($sukses) {
                            ?>
                            <div class="alert alert-success" role="alert">
                                <?php echo $sukses; ?>
                            </div>
                            <?php
                            header("refresh:5;url=obat.php");
                        }
                        ?>
                        <form action="" method="POST">
                            <div class="mb-3 row">
                                <label for="Nama" class="col-sm-2 col-form-label">Nama Obat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="Nama" name="Nama"
                                        value="<?php echo $Nama ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="Kadaluarsa" class="col-sm-2 col-form-label">Tanggal Kadaluarsa</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="Kadaluarsa" name="Kadaluarsa"
                                        value="<?php echo $Kadaluarsa ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="Jenis" class="col-sm-2 col-form-label">Jenis Obat</label>
                                <div class="col-sm-10">
                                    <select class="form-control" id="Jenis" name="Jenis">
                                        <option value="">- Pilih Jenis -</option>
                                        <option value="Tablet" <?php if ($Jenis == "Tablet")
                                            echo "selected" ?>>Tablet
                                            </option>
                                            <option value="Kapsul" <?php if ($Jenis == "Kapsul")
                                            echo "selected" ?>>Kapsul
                                            </option>
                                            <option value="Sirup" <?php if ($Jenis == "Sirup")
                                            echo "selected" ?>>Sirup
                                            </option>
                                            <option value="Salep" <?php if ($Jenis == "Salep")
                                            echo "selected" ?>>Salep
                                            </option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="kode_obat" class="col-sm-2 col-form-label">Kode Obat</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="kode_obat" name="kode_obat"
                                            value="<?php echo $KodeObat ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="dosis" class="col-sm-2 col-form-label">Dosis</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="dosis" name="dosis"
                                        value="<?php echo $Dosis ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="stok" class="col-sm-2 col-form-label">Stok</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="stok" name="stok"
                                        value="<?php echo $Stok ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="harga" class="col-sm-2 col-form-label">Harga</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="harga" name="harga"
                                        value="<?php echo $Harga ?>">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="efek_samping" class="col-sm-2 col-form-label">Efek Samping</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="efek_samping" name="efek_samping"
                                        value="<?php echo $EfekSamping ?>">
                                </div>
                            </div>
                            <div class="col-12">
                                <input type="submit" name="simpan" value="Simpan Data" class="btn btn-primary">
                            </div>
                        </form>
                    </div>
                </div>

                <!--- untuk mengeluarkan data  -->
                <div class="card">
                    <div class="card-header text-white bg-secondary">
                        DATA OBAT
                    </div>
                    <div class="card-body">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama Obat</th>
                                    <th scope="col">Tanggal Kadaluarsa</th>
                                    <th scope="col">Jenis Obat</th>
                                    <th scope="col">Kode Obat</th>
                                    <th scope="col">Dosis</th>
                                    <th scope="col">Stok</th>
                                    <th scope="col">Harga</th>
                                    <th scope="col">Efek Samping</th>
                                    <th scope="col">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- menampilkan data dari database -->
                                <?php
                                $sql2 = "SELECT * FROM obat ORDER BY id DESC";
                                $q2 = mysqli_query($konek, $sql2);
                                $urut = 1;
                                while ($r2 = mysqli_fetch_array($q2)) {
                                    $id = $r2['id'];
                                    $Nama = $r2['nama'];
                                    $Kadaluarsa = $r2['kadaluarsa'];
                                    $Jenis = $r2['jenis'];
                                    $KodeObat = $r2['kode_obat'];
                                    $Dosis = $r2['dosis'];
                                    $Stok = $r2['stok'];
                                    $Harga = $r2['harga'];
                                    $EfekSamping = $r2['efek_samping'];
                                    ?>
                                    <tr>
                                        <th scope="row"><?php echo $urut++ ?></th>
                                        <td><?php echo $Nama ?></td>
                                        <td><?php echo $Kadaluarsa ?></td>
                                        <td><?php echo $Jenis ?></td>
                                        <td><?php echo $KodeObat ?></td>
                                        <td><?php echo $Dosis ?></td>
                                        <td><?php echo $Stok ?></td>
                                        <td><?php echo $Harga ?></td>
                                        <td><?php echo $EfekSamping ?></td>
                                        <td>
                                            <a href="obat.php?op=edit&id=<?php echo $id ?>"><button type="button"
                                                    class="btn btn-warning">Edit</button></a>
                                            <a href="obat.php?op=delete&id=<?php echo $id ?>"
                                                onclick="return confirm('Yakin untuk hapus data?')"><button type="button"
                                                    class="btn btn-danger">Delete</button></a>
                                        </td>
                                    </tr>
                                    <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <style>
        body {
            background-color: whitesmoke;
            background-image: url("zzz.jpeg");
            background-size: cover;
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-position: center;
            font-family: 'Poppins', sans-serif;
        }

        <style>.mx-auto {
            width: 800px;
            /* Background image from gallery */
            background-image: url('php-mysql/1.jpgphp-mysql/1.jpg');
            /* Set background size to cover the entire container */
            background-size: cover;
            /* Center the background image */
            background-position: center;
            /* Add some opacity to make text readable */
            opacity: 0.9;
        }

        .card {
            margin-top: 10px;
        }
    </style>
    </style>
</body>

</html>