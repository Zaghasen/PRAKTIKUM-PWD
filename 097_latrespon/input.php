<?php
session_start();

if(empty($_SESSION['username'])) {
	header("location: index.php?message=belum_login");
	exit; // Hindari eksekusi kode selanjutnya jika belum login
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
      
    </style>
</head>
<body>

    <nav class="navbar bg-body-tertiary">
  <div class="container-fluid">
  <h2>Selamat Datang,  <?php echo $_SESSION["username"]?></h2>
  </div>
</nav>
  
    <br><br>
    <br>
    <center>
    <h1>Tambah Data </h1><br>
    <?php if(isset($_GET['message']) && $_GET['message'] == 'tambah_sukses'): ?>
        <div class="alert alert-success" role="alert">
            Data berhasil ditambahkan.
        </div>
    <?php endif; ?>
    <form action="inputp.php" method="post">
        <table>
            <tr>
                <td>Nama Barang </td>
                <td><input class="form-control" type="text" name="barang" required></td>
            </tr>
            <tr>
                <td>kategori</td>
                <td>
                            <select class="form-select"  name="kategori" id="kategori"  required>
                                <option value="" >
                                    kategori
                                </option>
                                <option value="Pakaian" >
                                       Pakaian
                                    </option>
                                    <option value="Alat Tulis" >
                                        Alat Tulis
                                    </option>
                                    <option value="Makanan" >
                                        Makanan
                                    </option>
                                    <option value="Elektronik" >
                                        Elektronik
                                    </option>
                                  
                                </select>
                           
                </td>
            </tr>
            <tr>
                <td>qty</td>
                <td><input class="form-control" type="number" name="qty" required></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input class="form-control" type="number" name="harga" required></td>
            </tr>
            <tr>
                <td colspan="2"><button type="submit">Unggah</button></td>
            </tr>
        </table>
    </form>
    </center>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>
