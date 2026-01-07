<?php
session_start();
require_once __DIR__ . '/koneksi.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'pengajar') {
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Laporan Absensi</title>
<style>
table { width:95%; margin:40px auto; border-collapse:collapse; }
th, td { border:1px solid #ccc; padding:10px; text-align:center; }
th { background:#1e1e2f; color:white; }
</style>
</head>
<body>

<h2 align="center">Laporan Absensi Siswa</h2>

<table>
<tr>
    <th>No</th>
    <th>Nama Siswa</th>
    <th>Tanggal</th>
    <th>Status</th>
</tr>

<?php
$no=1;
$q=mysqli_query($conn,"
    SELECT p.nama, a.tanggal, a.status
    FROM absensi a
    JOIN pengguna p ON a.id_siswa = p.id_user
    ORDER BY a.tanggal DESC
");
while($d=mysqli_fetch_assoc($q)){
    echo "<tr>
        <td>$no</td>
        <td>{$d['nama']}</td>
        <td>{$d['tanggal']}</td>
        <td>{$d['status']}</td>
    </tr>";
    $no++;
}
?>
</table>

<p align="center"><a href="dashboard_pengajar.php">← Kembali</a></p>

</body>
</html>