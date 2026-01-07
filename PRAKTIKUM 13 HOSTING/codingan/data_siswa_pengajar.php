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
<title>Data Siswa</title>
<style>
table { width:90%; margin:40px auto; border-collapse:collapse; }
th, td { border:1px solid #ccc; padding:8px; text-align:center; }
th { background:#1e1e2f; color:white; }
</style>
</head>
<body>

<h2 align="center">Data Siswa</h2>

<table>
<tr>
    <th>No</th>
    <th>ID Siswa</th>
    <th>Nama</th>
    <th>Email</th>
</tr>

<?php
$no=1;
$q=mysqli_query($conn,"SELECT * FROM pengguna WHERE role='siswa'");
while($d=mysqli_fetch_assoc($q)){
    echo "<tr>
        <td>$no</td>
        <td>{$d['id_user']}</td>
        <td>{$d['nama']}</td>
        <td>{$d['email']}</td>
    </tr>";
    $no++;
}
?>
</table>

<p align="center"><a href="dashboard_pengajar.php">← Kembali</a></p>

</body>
</html>