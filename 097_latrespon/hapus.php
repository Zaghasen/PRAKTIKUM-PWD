<?php
session_start();

if(empty($_SESSION['username'])) {
	header("location: login.php?message=belum_login");
	exit; 
}

if(isset($_GET['id'])) {
    include('koneksi.php');

    $barang = mysqli_real_escape_string($connect, $_GET['id']);

    $sql = "DELETE FROM barang WHERE barang='$barang'";
    $result = mysqli_query($connect, $sql);

    if($result) {
        header("location: data.php?message=hapus_sukses");
        exit;
    } else {
        header("location: data.php?message=hapus_gagal");
        exit;
    }
} else {
    header("location: data.php");
    exit;
}
