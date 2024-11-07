<?php
session_start();
include"koneksi.php";


$barang = $_POST['barang'];
$kategori = $_POST['kategori'];
$qty = $_POST['qty'];
$harga = $_POST['harga'];
$query = "INSERT INTO barang (barang, kategori, qty, harga) VALUES ('$barang', '$kategori', '$qty', '$harga')";
$result = mysqli_query($connect, $query);

if ($result) {
    header("Location: data.php?status=sukses");
} else {
    header("Location: input.php?status=error");
}

