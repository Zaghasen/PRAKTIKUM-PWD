<?php
session_start();

if(empty($_SESSION['username'])) {
	header("location: index.php?message=belum_login");
	exit; // Hindari eksekusi kode selanjutnya jika belum login
}

// Memeriksa apakah NIM telah diterima dari URL
if(isset($_GET['id'])) {
    include('koneksi.php');

    // Escape input untuk mencegah SQL Injection
    $nim = mysqli_real_escape_string($connect, $_GET['id']);

    // Query untuk mengambil data mahasiswa berdasarkan NIM
    $barang = "SELECT * FROM barang WHERE barang='$nim'";
    $result = mysqli_query($connect, $barang);

    if(mysqli_num_rows($result) == 1) {
        // Memuat data dari database
        $data = mysqli_fetch_assoc($result);
    } else {
        // Redirect ke halaman data.php jika data tidak ditemukan
        header("location: data.php");
        exit;
    }
} else {
    // Redirect ke halaman data.php jika NIM tidak diterima dari URL
    header("location: data.php");
    exit;
}

// Memproses form jika ada data yang dikirim
if(isset($_POST['submit'])) {
    // Escape input untuk mencegah SQL Injection
    $nim_baru = mysqli_real_escape_string($connect, $_POST['NIM']);
    $nama = mysqli_real_escape_string($connect, $_POST['Nama']);
    $kelamin = mysqli_real_escape_string($connect, $_POST['kel']);
    $prodi = mysqli_real_escape_string($connect, $_POST['prodi']);

    // Query untuk update data ke database
    $sql = "UPDATE mhs SET NIM='$nim_baru', Nama='$nama', kel='$kelamin', prodi='$prodi' WHERE NIM='$nim'";
    $result = mysqli_query($connect, $sql);

    if($result) {
        // Redirect kembali ke halaman data.php dengan pesan sukses
        header("location: data.php?message=edit_sukses");
        exit;
    } else {
        header("location: edit.php?id=$nim&message=edit_gagal");
        exit;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    
</head>
<body>
 
    <nav class="navbar bg-body-tertiary">
        <div class="container-fluid">
            <h2>Selamat Datang, <?php echo $_SESSION["username"] ?></h2>
        </div>
    </nav>
    
    <br><br>
    <br>
    <center>
    <div class="container">
    <h1>Ubah Data Mahasiswa</h1>
		<br>
		<br>
        <form action="editp.php" method="post">
        <?php
			include('koneksi.php');

			$id = $_GET['id'];

			$sql	= "SELECT * FROM barang WHERE barang='$nim'";
			$query	= mysqli_query($connect, $sql);

			while ($data = mysqli_fetch_array($query)) {
			?>
        <table>
        <input type="hidden" name="barang_lama" value="<?= $data['barang']; ?>">
                <input type="hidden" name="kategori_lama" value="<?= $data['kategori']; ?>">
                <input type="hidden" name="qty_lama" value="<?= $data['qty']; ?>">
                <input type="hidden" name="harga_lama" value="<?= $data['harga']; ?>">
            <tr>
                <td>Nama Barang </td>
                <td><input class="form-control" type="text" name="barang_baru" value="<?= $data['barang']; ?>"></td>
            </tr>
            <tr>
                <td>kategori</td>
                <td>
                            <select class="form-select"  name="kategori_baru" id="kategori"    >
                             
                                <option value="Pakaian" <?php if($data['kategori'] == 'Pakaian') ?> ; >
                                       Pakaian
                                    </option>
                                    <option value="Alat Tulis" <?php if($data['kategori'] == 'Alat Tulis') ?> ;>
                                        Alat Tulis
                                    </option>
                                    <option value="Makanan" <?php if($data['kategori'] == 'Makanan') ?> ;>
                                        Makanan
                                    </option>
                                    <option value="Elektronik" <?php if($data['kategori'] == 'Elektronik') ?> ;>
                                        Elektronik
                                    </option>
                                  
                                </select>
                           
                </td>
            </tr>
            <tr>
                <td>qty</td>
                <td><input class="form-control" type="number" name="qty_baru" value="<?= $data['qty']; ?>"></td>
            </tr>
            <tr>
                <td>Harga</td>
                <td><input class="form-control" type="number" name="harga_baru" value="<?= $data['harga']; ?>"></td>
            </tr>
         
		
			</table>
			<?php } ?>
			<br>
			<input type="submit" name="">
		</form>
	</center>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>