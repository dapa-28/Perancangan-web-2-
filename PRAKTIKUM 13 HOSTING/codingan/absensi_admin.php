<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}
require_once './koneksi.php';
?>
<!DOCTYPE html>
<html>
<head>
<title>Data Absensi</title>
<style>
table { width: 95%; margin: 30px auto; border-collapse: collapse; }
th, td { padding: 10px; border: 1px solid #ccc; text-align: center; }
th { background: #1e1e2f; color: white; }
</style>
</head>
<body>

<h2 style="text-align:center">Data Absensi Siswa</h2>

<table>
<tr>
    <th>No</th>
    <th>Nama Siswa</th>
    <th>Tanggal</th>
    <th>Status</th>
    <th>Keterangan</th>
</tr>

<?php
$no = 1;
$q = mysqli_query($conn,"
    SELECT p.nama, a.tanggal, a.status, a.keterangan
    FROM absensi a
    JOIN pengguna p ON a.id_siswa = p.id_user
    ORDER BY a.tanggal DESC
");
while ($d = mysqli_fetch_assoc($q)) {
    echo "<tr>
        <td>$no</td>
        <td>{$d['nama']}</td>
        <td>{$d['tanggal']}</td>
        <td>{$d['status']}</td>
        <td>{$d['keterangan']}</td>
    </tr>";
    $no++;
}
?>
</table>

<a href="dashboard_admin.php">← Kembali</a>

</body>
</html>