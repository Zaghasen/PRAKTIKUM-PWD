<?php
include 'koneksi.php';

$koneksi = new mysqli($host, $user, $pass, $db);

if ($koneksi->connect_error) {
    die("Koneksi ke database gagal: " . $koneksi->connect_error);
}

$pesan = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $no_telp = $_POST['no_telp'];
    $tgl_perjalanan = $_POST['tgl_perjalanan'];
    $asal_kota = $_POST['asal_kota'];
    $paket_wisata = $_POST['paket_wisata'];
    $catatan = $_POST['catatan'];
    $jml_orang = $_POST['jml_orang'];

    $sql = "INSERT INTO reservasi (nama, email, no_telp, tgl_perjalanan, asal_kota, paket_wisata, catatan, jml_orang)
    VALUES ('$nama', '$email', '$no_telp', '$tgl_perjalanan', '$asal_kota', '$paket_wisata', '$catatan', '$jml_orang')";
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
    <title>TIGA DEWA ADVENTURE RESERVATION FORM</title>
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
                        <h2>TIGA DEWA ADVENTURE RESERVATION FORM</h2>
                    </div>
                    <div class="card-body">
                        <?php echo $pesan; ?>
                        <form method="post">
                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama</label>
                                <input type="text" class="form-control" id="nama" name="nama">
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>
                            <div class="mb-3">
                                <label for="wa_notelp" class="form-label">WA/No Telp</label>
                                <input type="text" class="form-control" id="no_telp" name="no_telp">
                                <small id="no_telp" class="form-text text-muted">*No WA harus aktif untuk
                                    konfirmasi.</small>
                            </div>
                            <div class="mb-3">
                                <label for="tanggal_perjalanan" class="form-label">Tanggal Perjalanan</label>
                                <input type="date" class="form-control" id="tgl_perjalanan" name="tgl_perjalanan">
                            </div>
                            <div class="mb-3">
                                <label for="asal_kota" class="form-label">Asal Kota</label>
                                <input type="text" class="form-control" id="asal_kota" name="asal_kota">
                            </div>
                            <div class="mb-3">
                                <label for="paket_wisata" class="form-label">Pilih Paket Wisata</label>
                                <select class="form-select" id="paket_wisata" name="paket_wisata">
                                    <option value="paket1">Paket 1 - IDR 500.000 / pax</option>
                                    <option value="paket2">Paket 2 - IDR 1.000.000 / pax</option>
                                    <option value="paket3">Paket 3 - IDR 1.500.000 / pax (Diskon 10%)</option>
                                    <option value="paket4">Paket 4 - IDR 1.750.000 / pax (Diskon 10%)</option>
                                    <option value="paket5">Paket 5 - IDR 2.000.000 / pax (Diskon 10%)</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label for="jumlah_orang" class="form-label">Jumlah Orang</label>
                                <input type="number" class="form-control" id="jml_orang" name="jml_orang" min="1"
                                    required>
                            </div>
                            <div class="mb-3">
                                <label for="catatan" class="form-label">Catatan</label>
                                <textarea class="form-control" id="catatan" name="catatan" rows="3"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        <a href="riwayat_transaksi.php" class="btn btn-secondary">Lihat Riwayat Transaksi</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

</html>