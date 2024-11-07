<?php
session_start();

$username = "root";
$password = "";
$host = "localhost";
$db = "YUPI";

$koneksi = mysqli_connect($host, $username, $password, $db);
if (!$koneksi) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}

if (!isset($_SESSION['email'])) {
    header("location: login.php");
    exit();
}

$email = $_SESSION['email'];

$query = "SELECT * FROM user WHERE email='$email'";
$result = mysqli_query($koneksi, $query);

$menu = array();

while ($row = mysqli_fetch_assoc($result)) {
    $menu[] = $row;
}

mysqli_close($koneksi);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CEK OUT</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5" style="background-color: #F5DEB3;">
        <h2 class="text-center mb-4">CEK OUT</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Menu</th>
                    <th>Jumlah Pesan</th>
                    <th>Total Harga</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($menu as $mn): ?>
                    <tr>
                        <td><?php echo $mn['nama']; ?></td>
                        <td>
                            <?php
                            $menu_item = $mn['menu'];
                            $harga = 0;
                            switch ($menu_item) {
                                case "Nasi Goreng":
                                    echo "Nasi Goreng<br>";
                                    $harga = 25000;
                                    break;
                                case "Mie Ayan":
                                    echo "Mie Ayam<br>";
                                    $harga = 20000;
                                    break;
                                case "Sate Ayam":
                                    echo "Sate Ayam<br>";
                                    $harga = 15000;
                                    break;
                                case "Es Teh Manis":
                                    echo "es Teh Manis<br>";
                                    $harga = 5000;
                                    break;
                                case "Kopi Susu":
                                    echo "Kopi Susu<br>";
                                    $harga = 10000;
                                    break;
                                case "Pisang Goreng":
                                    echo "Pisang Goreng<br>";
                                    $harga = 8000;
                                    break;
                                default:
                                    echo "Harga tidak tersedia";
                            }
                            ?>
                        </td>
                        <td><?php echo $mn['jml_pesan']; ?></td>
                        <td><?php echo $mn['jml_pesan'] * $harga; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
        <div class="text-center">
            <a href="YUPI.php" class="btn btn-primary">Kembali ke Halaman Utama</a>
        </div>
    </div>
</body>

</html>