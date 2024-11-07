<?php
session_start();

$username = "root";
$password = "";
$host = "localhost";
$db = "kelana";

$koneksi = mysqli_connect($host, $username, $password, $db);
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

if (!isset($_SESSION['email'])) {
    header("location: login.php");
    exit();
}

$email = $_SESSION['email'];

$query = "SELECT * FROM reservasi WHERE email='$email'";
$result = mysqli_query($koneksi, $query);

$reservasi = array();

while ($row = mysqli_fetch_assoc($result)) {
    $reservasi[] = $row;
}

mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservasi Saya</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5" style="background-color: #F5DEB3;">
        <h2 class="text-center mb-4">Reservasi Saya</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID Reservasi</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>WA/No Telp</th>
                    <th>Tanggal Perjalanan</th>
                    <th>Asal Kota</th>
                    <th>Paket Wisata</th>
                    <th>Jumlah Orang</th>
                    <th>Total Harga</th>
                    <th>Catatan</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($reservasi as $rsv): ?>
                    <tr>
                        <td><?php echo $rsv['id_reservasi']; ?></td>
                        <td><?php echo $rsv['nama']; ?></td>
                        <td><?php echo $rsv['email']; ?></td>
                        <td><?php echo $rsv['no_telp']; ?></td>
                        <td><?php echo $rsv['tgl_perjalanan']; ?></td>
                        <td><?php echo $rsv['asal_kota']; ?></td>
                        <td>
                            <?php
                            $paket_wisata = $rsv['paket_wisata'];
                            $harga = 0;
                            $harga_diskon = 0; // Initialize harga_diskon
                            switch ($paket_wisata) {
                                case "paket1":
                                    echo "Paket 1<br>";
                                    $harga = 500000;
                                    $harga_diskon = $harga;
                                    break;
                                case "paket2":
                                    echo "Paket 2<br>";
                                    $harga = 1000000;
                                    $harga_diskon = $harga;
                                    break;
                                case "paket3":
                                    echo "Paket 3<br>";
                                    $harga = 1500000;
                                    $harga_diskon = $harga * 0.9;
                                    echo "<strike>IDR $harga</strike><br>IDR $harga_diskon (Diskon 10%)";
                                    break;
                                case "paket4":
                                    echo "Paket 4<br>";
                                    $harga = 1750000;
                                    $harga_diskon = $harga * 0.9;
                                    echo "<strike>IDR $harga</strike><br>IDR $harga_diskon (Diskon 10%)";
                                    break;
                                case "paket5":
                                    echo "Paket 5<br>";
                                    $harga = 2000000;
                                    $harga_diskon = $harga * 0.9;
                                    echo "<strike>IDR $harga</strike><br>IDR $harga_diskon (Diskon 10%)";
                                    break;
                                default:
                                    echo "Harga tidak tersedia";
                            }
                            ?>
                        </td>
                        <td><?php echo $rsv['jml_orang']; ?></td>
                        <td><?php echo 'IDR ' . ($rsv['jml_orang'] * $harga_diskon); ?></td>
                        <td><?php echo $rsv['catatan']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="text-center">
            <a href="OT.php" class="btn btn-primary">Kembali ke Halaman Utama</a>
        </div>
    </div>
</body>

</html>