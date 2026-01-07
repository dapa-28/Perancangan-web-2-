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
<title>Input Absensi</title>
<style>
body { font-family: Arial; background:#f5f7ff; }
form { width:400px; margin:50px auto; background:white; padding:20px; border-radius:10px; }
input, select { width:100%; padding:8px; margin:8px 0; }
button { padding:10px; width:100%; background:#1e40af; color:white; border:none; }
</style>
</head>
<body>

<h2 align="center">Input Absensi</h2>

<form method="POST">
    <input type="text" name="id_siswa" placeholder="ID Siswa" required>
    <input type="date" name="tanggal" required>
    <select name="status" required>
        <option value="">-- Status --</option>
        <option value="Hadir">Hadir</option>
        <option value="Izin">Izin</option>
        <option value="Alpa">Alpa</option>
    </select>
    <button type="submit">Simpan</button>
</form>

<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    mysqli_query($conn,"
        INSERT INTO absensi (id_siswa, tanggal, status)
        VALUES ('$_POST[id_siswa]', '$_POST[tanggal]', '$_POST[status]')
    ");
    echo "<p align='center' style='color:green'>Absensi berhasil disimpan</p>";
}
?>

<p align="center"><a href="dashboard_pengajar.php">← Kembali</a></p>

</body>
</html>