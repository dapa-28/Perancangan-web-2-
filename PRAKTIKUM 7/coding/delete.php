<?php
include "koneksi.php";

$id = $_GET['id'];

// ambil nama file
$q = mysqli_query($conn, "SELECT foto FROM foto WHERE id=$id");
$data = mysqli_fetch_assoc($q);

// hapus file di folder
unlink("uploads/" . $data['foto']);

// hapus data di database
mysqli_query($conn, "DELETE FROM foto WHERE id=$id");

echo "Foto berhasil dihapus! <br><a href='tampil.php'>Kembali</a>";
?>