<?php
require_once './koneksi.php';


if (!isset($_GET['id'])) {
    die("❌ ID pengguna tidak ditemukan.");
}

$id_user = $_GET['id'];


$sql = "DELETE FROM pengguna WHERE id_user = '$id_user'";
$res = mysqli_query($conn, $sql);

if ($res) {
    echo "<script>alert('✅ Data berhasil dihapus!');window.location='seleksi_pengguna.php';</script>";
} else {
    echo "<p style='color:red;'>❌ Gagal menghapus data: " . mysqli_error($conn) . "</p>";
}

mysqli_close($conn);
?>