<?php
session_start();
require_once __DIR__ . '/koneksi.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'wali_murid') {
    header("Location: login.php");
    exit();
}

// sementara: wali melihat absensi berdasarkan id_user sendiri
$id_siswa = $_SESSION['id_user'];
?>

<!DOCTYPE html>
<html>
<head>
<title>Absensi Anak</title>
<style>
table {
    width: 95%;
    margin: 40px auto;
    border-collapse: collapse;
}
th, td {
    border: 1px solid #ccc;
    padding: 10px;
    text-align: center;
}
th {
    background: #166534;
    color: white;
}
</style>
</head>
<body>

<h2 align="center">Riwayat Absensi Anak</h2>

<table>
<tr>
    <th>No</th>
    <th>Tanggal</th>
    <th>Status</th>
</tr>

<?php
$no = 1;
$q = mysqli_query($conn,"
    SELECT tanggal, status
    FROM absensi
    WHERE id_siswa = '$id_siswa'
    ORDER BY tanggal DESC
");

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

<p align="center">
    <a href="dashboard_wali.php">← Kembali ke Dashboard</a>
</p>

</body>
</html>