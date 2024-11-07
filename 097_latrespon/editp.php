<?php
include 'koneksi.php';

$barang_lama	    = $_POST['barang_lama'];
$barang_baru	    = $_POST['barang_baru'];
$kategori_lama		= $_POST['kategori_lama'];
$kategori_baru		= $_POST['kategori_baru'];
$qty_lama	= $_POST['qty_lama'];
$qty_baru	= $_POST['qty_baru'];
$harga_lama		= $_POST['harga_lama'];
$harga_baru 	= $_POST['harga_baru'];


$sql	= "UPDATE barang SET barang='$barang_baru', kategori='$kategori_baru', qty='$qty_baru', harga='$harga_baru' WHERE barang='$barang_lama'";

$query	= mysqli_query($connect, $sql) or die(mysqli_error($connect));

if($query) {
    $_SESSION['success_message'] = "Data berhasil diubah.";
    header("location: edit.php?notif=Data Berhasil diubah");
    exit();
} else {
    echo "Input Data Gagal.";
}
