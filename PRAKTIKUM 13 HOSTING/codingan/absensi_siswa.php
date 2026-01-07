<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'siswa') {
    header("Location: login.php");
    exit();
}
require_once './koneksi.php';

$nama = $_SESSION['nama'];
?>
<!DOCTYPE html>
<html>
<head>
<title>Absensi Saya</title>
<style>
body { font-family: Arial; background: #f5f8ff; }
table {
    width: 80%;
    margin: 40px auto;
    border-collapse: collapse;
}
th, td {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: center;
}
th {
    background: #2b2e4a;
    color: white;
}
a { margin-left: 10%; text-decoration: none; }
</style>
</head>
<body>

<h2 style="text-align:center">Riwayat Absensi Saya</h2>

<table>
<tr>
    <th>No</th>
    <th>Tanggal</th>
    <th>Status</th>
</tr>

<?php
$no = 1;
$q = mysqli_query($conn, "SELECT * FROM absensi WHERE nama_siswa='$nama' ORDER BY tanggal DESC");
while ($d = mysqli_fetch_assoc($q)) {
    echo "<tr>
        <td>$no</td>
        <td>{$d['tanggal']}</td>
        <td>{$d['status']}</td>
    </tr>";
    $no++;
}
?>
</table>

<a href="dashboard_siswa.php">← Kembali ke Dashboard</a>

</body>
</html>