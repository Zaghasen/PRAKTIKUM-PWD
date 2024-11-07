<?php
session_start();

if (empty($_SESSION['username'])) {
    header("location: index.php?message=belum_login");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Mahasiswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
   
</head>
<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <h2>Selamat Datang, <?php echo $_SESSION["username"] ?></h2>
            <a class="nav-link" href="logout.php">Logout</a>
        </div>
        
    </nav>
    <br><br>
    <br>
    <center>
        <h1>Data barang</h1><br>
        <?php if (isset($_GET['message'])): ?>
            <?php if ($_GET['message'] == 'hapus_sukses'): ?>
                <div class="alert alert-success" role="alert">
                    Data telah berhasil dihapus.
                </div>
            <?php elseif ($_GET['message'] == 'hapus_gagal'): ?>
                <div class="alert alert-danger" role="alert">
                    Terjadi kesalahan saat menghapus data.
                </div>
            <?php endif; ?>
        <?php endif; ?>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">NO.</th>
                    <th scope="col">Nama Barang</th>
                    <th scope="col">Kategori</th>
                    <th scope="col">Qty</th>
                    <th scope="col">Harga</th>
                    <th scope="col">Total</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <?php
            include('koneksi.php');

            $sql = "SELECT * FROM barang";
            $query = mysqli_query($connect, $sql);

            $no = 1; 
            $total=0;
            $total_harga = 0; // Variable to store the total price

            while ($data = mysqli_fetch_array($query)){
              
                $total=$data['qty'] * $data['harga'];
                $total_harga += $total; // Add the price to the total
            ?>
            <tbody>
                <tr>
                    <th scope="row"><?php echo $no++; ?></th>
                    <td><?php echo $data['barang']; ?></td>
                    <td><?php echo $data['kategori']; ?></td>
                    <td><?php echo $data['qty']; ?></td>
                    <td><?php echo $data['harga']; ?></td>
                    <td><?php echo $total ?></td>
                    <td><a href="edit.php?id=<?= $data['barang']; ?>"><button class="btn btn-secondary">Edit</button></a></td>
                    <td><a href="hapus.php?id=<?= $data['barang']; ?>"><button class="btn btn-danger">Delete</button></a></td>
                </tr>
            </tbody>
            <?php } ?>
            <tfoot>
                <tr>
                    <th colspan="5">Total Harga</th>
                    <th><?php echo $total_harga; ?></th>
                    <th colspan="2"></th>
                </tr>
            </tfoot>
        </table>
        <a href="input.php"><button type="button" class="btn btn-primary">Tambah Data</button></a>
    </center>
</body>
</html>
