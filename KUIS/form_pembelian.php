<?php
include 'koneksi.php';

$koneksi = new mysqli($host, $user, $pass, $db);

if ($koneksi->connect_error) {
    die("Koneksi ke database gagal: " . $koneksi->connect_error);
}

$pesan = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $menu = $_POST['menu'];
    $jml_pesan = $_POST['jml_pesan'];

    $sql = "INSERT INTO menu (nama, menu, jml_pesan)
    VALUES ('$nama', '$menu', '$jml_pesan')";
    ;

    if ($koneksi->query($sql) === TRUE) {
        $pesan = '<div class="alert alert-success" role="alert">Data berhasil disimpan.</div>';
    } else {
        echo "Error: " . $sql . "<br>" . $koneksi->error;
    }
}

$koneksi->close();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CEK OUT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
        }

        .card-header {
            background-color: #6c757d;
            color: white;
            border-radius: 15px 15px 0 0;
        }

        .card-footer {
            background-color: #f8f9fa;
            border-top: none;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h2>CEK OUT</h2>
                        </h2>
                    </div>
                    <div class="card-body">
                        <?php echo $pesan; ?>
                        <form method="post">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama">
                            </div>
                            <div class="mb-3">
                                <label for="paket_wisata" class="form-label">Menu</label>
                                <select class="form-select" id="menu" name="menu">
                                    <option value="paket1">Nasi Goreng - Rp. 25000</option>
                                    <option value="paket1">Mie Ayam - Rp. 20000</option>
                                    <option value="paket1">Sate Ayam - Rp. 15000</option>
                                    <option value="paket1">Es Teh Manis - Rp. 5000</option>
                                    <option value="paket1">Kopi Susu - Rp. 10000</option>
                                    <option value="paket1">Pisang Goreng - Rp. 8000</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="jumlah_orang" class="form-label">Jumlah Pesan</label>
                                <input type="number" class="form-control" id="jml_pesan" name="jml_pesan" min="1"
                                    required>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <a href="cekout.php" class="btn btn-secondary">Lihat Riwayat Transaksi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>