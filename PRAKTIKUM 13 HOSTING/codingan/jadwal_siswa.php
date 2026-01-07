<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'siswa') {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Jadwal Bimbel</title>
<style>
body {
    font-family: Arial;
    background: #f5f8ff;
}
.box {
    width: 500px;
    margin: 50px auto;
    background: white;
    padding: 25px;
    border-radius: 10px;
}
ul li {
    padding: 8px 0;
}
a { text-decoration: none; }
</style>
</head>
<body>

<div class="box">
<h2>Jadwal Bimbel</h2>

<ul>
    <li>📘 Matematika — Senin 16.00</li>
    <li>📗 Bahasa Inggris — Rabu 15.30</li>
    <li>📕 IPA — Jumat 16.00</li>
</ul>

<a href="dashboard_siswa.php">← Kembali</a>
</div>

</body>
</html>