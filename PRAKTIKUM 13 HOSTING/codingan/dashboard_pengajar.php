<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'pengajar') {
    header("Location: login.php");
    exit();
}
require_once __DIR__ . '/koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard Pengajar - Absensi Bimbel</title>
<style>
body {
    margin: 0;
    font-family: "Segoe UI", sans-serif;
    background-color: #f5f8ff;
}
.navbar {
    background: rgba(29, 32, 27, 0.95);
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 18px 40px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.1);
}
.navbar a {
    color: white;
    text-decoration: none;
    font-weight: bold;
}
.hero {
    background: linear-gradient(to right, rgba(240, 243, 247, 0.9), rgba(171, 174, 177, 0.5)),
                url('koala.jpg') center/cover no-repeat;
    color: white;
    padding: 100px 60px;
}
.cards {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 25px;
    padding: 50px 20px;
}
.card {
    background: white;
    width: 250px;
    padding: 25px;
    border-radius: 12px;
    box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    text-align: center;
}
.card a {
    display: inline-block;
    background: #2563eb;
    color: white;
    padding: 8px 16px;
    border-radius: 8px;
    text-decoration: none;
}
footer {
    text-align: center;
    padding: 20px;
    background: #121213;
    color: white;
}
</style>
</head>
<body>

<div class="navbar">
    <div>
        👋 Hai, <b><?= htmlspecialchars($_SESSION['nama']) ?></b> (Pengajar)
    </div>
    <a href="logout.php">Logout</a>
</div>

<section class="hero">
    <h2>Dashboard Pengajar</h2>
    <p>Kelola absensi dan pantau kehadiran siswa bimbel.</p>
</section>

<section class="cards">

    <div class="card">
        <h3>🗓 Input Absensi</h3>
        <p>Catat kehadiran siswa.</p>
        <a href="form_absensi.php">Buka</a>
    </div>

    <div class="card">
        <h3>📚 Data Siswa</h3>
        <p>Lihat data siswa.</p>
        <a href="data_siswa_pengajar.php">Buka</a>
    </div>

    <div class="card">
        <h3>📈 Laporan Absensi</h3>
        <p>Lihat rekap absensi.</p>
        <a href="laporan_pengajar.php">Buka</a>
    </div>

</section>

<footer>© 2025 Sistem Absensi Bimbel</footer>

</body>
</html>