<!-- Buatlah website yang menerapkan materi session, cookie, dan CRUD ( Create, Read, Update, Delete).  Ketentuan halaman yakni login, tabel data beserta button CRUD, dan button logout. Kriteria penilaian penerapan materi dan kreativitas tampilan website. Diperbolehkan menggunakan bootstrap sebagai framework UI. Berikut pembagian tema :

NIM ganjil tema pendataan obat di apotik
NIM genap tema pendataan produk supermarket

Kumpulkan link google drive dari zip hasil pengerjaan. -->

<?php
// koneksi ke database
$conn = mysqli_connect("localhost", "root", "", "mhs");


function query($query)
{
	global $conn;
	$result = mysqli_query($conn, $query);
	$rows = [];
	while ($row = mysqli_fetch_assoc($result)) {
		$rows[] = $row;
	}
	return $rows;
}


function tambah($data)
{
	global $conn;

	$nama = htmlspecialchars($data["nama"]);
	$nim = htmlspecialchars($data["nim"]);
	$jurusan = htmlspecialchars($data["jurusan"]);

	$query = "INSERT INTO mahasiswa
				VALUES
			  ('', '$nama', '$nim', '$jurusan')
			";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function hapus($id)
{
	global $conn;
	mysqli_query($conn, "DELETE FROM mahasiswa WHERE id = $id");
	return mysqli_affected_rows($conn);
}


function ubah($data)
{
	global $conn;

	$id = $data["id"];
	$nama = htmlspecialchars($data["nama"]);
	$nim = htmlspecialchars($data["nim"]);
	$jurusan = htmlspecialchars($data["jurusan"]);


	$query = "UPDATE mahasiswa SET
				nama = '$nama',
				nim = '$nim',
				jurusan = '$jurusan'
			  WHERE id = $id
			";

	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}
