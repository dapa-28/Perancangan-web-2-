<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'siswa') {
    header("Location: login.php");
    exit();
}
require_once './koneksi.php';

$username = $_SESSION['username'];
$q = mysqli_query($conn, "SELECT * FROM pengguna WHERE username='$username'");
$data = mysqli_fetch_assoc($q);
?>
<!DOCTYPE html>
<html>
<head>
<title>Profil Siswa</title>
<style>
body { font-family: Arial; background: #f5f8ff; }
.box {
    width: 400px;
    margin: 50px auto;
    background: white;
    padding: 25px;
    border-radius: 10px;
}
table td { padding: 8px; }
a { text-decoration: none; color: blue; }
</style>
</head>
<body>

<div class="box">
<h2>Profil Saya</h2>
<table>
<tr><td>Nama</td><td>: <?= $data['nama'] ?></td></tr>
<tr><td>Username</td><td>: <?= $data['username'] ?></td></tr>
<tr><td>Email</td><td>: <?= $data['email'] ?></td></tr>
<tr><td>Status</td><td>: <?= ucfirst($data['status_akun']) ?></td></tr>
</table>

<br>
<a href="dashboard_siswa.php">← Kembali</a>
</div>

</body>
</html>