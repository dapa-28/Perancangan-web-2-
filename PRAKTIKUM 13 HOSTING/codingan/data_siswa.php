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
<title>Data Siswa</title>
<style>
table { width: 90%; margin: 30px auto; border-collapse: collapse; }
th, td { padding: 10px; border: 1px solid #ccc; text-align: center; }
th { background: #1e1e2f; color: white; }
</style>
</head>
<body>

<h2 style="text-align:center">Data Siswa</h2>

<table>
<tr>
    <th>No</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Status</th>
</tr>

<?php
$no = 1;
$q = mysqli_query($conn, "SELECT * FROM pengguna WHERE role='siswa'");
while ($d = mysqli_fetch_assoc($q)) {
    echo "<tr>
        <td>$no</td>
        <td>{$d['nama']}</td>
        <td>{$d['email']}</td>
        <td>{$d['status_akun']}</td>
    </tr>";
    $no++;
}
?>
</table>

<a href="dashboard_admin.php">← Kembali</a>

</body>
</html>