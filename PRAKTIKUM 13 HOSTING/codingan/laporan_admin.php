<?php
session_start();
require_once __DIR__ . '/koneksi.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: login.php");
    exit();
}

if (!$conn) {
    die("Koneksi database tidak ditemukan");
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Laporan Absensi</title>
<style>
body {
    font-family: Arial, sans-serif;
    background: #f5f7ff;
}
table {
    width: 95%;
    margin: 30px auto;
    border-collapse: collapse;
    background: white;
}
th, td {
    padding: 10px;
    border: 1px solid #ccc;
    text-align: center;
}
th {
    background: #1e1e2f;
    color: white;
}
h2 {
    text-align: center;
    margin-top: 30px;
}
a {
    display: block;
    width: fit-content;
    margin: 20px auto;
    text-decoration: none;
    color: #1e1e2f;
    font-weight: bold;
}
</style>
</head>

<body>

<h2>Laporan Absensi</h2>

<table>
<tr>
    <th>No</th>
    <th>Nama Siswa</th>
    <th>Tanggal</th>
    <th>Status</th>
</tr>

<?php
$no = 1;
$q = mysqli_query($conn,"
    SELECT p.nama, a.tanggal, a.status
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
    </tr>";
    $no++;
}
?>
</table>

<a href="dashboard_admin.php">← Kembali ke Dashboard Admin</a>

</body>
</html>