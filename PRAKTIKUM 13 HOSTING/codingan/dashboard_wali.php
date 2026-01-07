<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'wali_murid') {
    header("Location: login.php");
    exit();
}
require_once __DIR__ . '/koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard Wali Murid - Absensi Bimbel</title>
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
}
.navbar a {
    color: white;
    text-decoration: none;
    font-weight: bold;
}
.hero {
    background: linear-gradient(to right, rgba(160, 163, 161, 0.9), rgba(187,247,208,0.5)),
                url('koala.jpg') center/cover no-repeat;
    color: white;
    padding: 100px 60px;
}
.cards {
    display: flex;
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
    background: #16a34a;
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
        👋 Hai, <b><?= htmlspecialchars($_SESSION['nama']) ?></b> (Wali Murid)
    </div>
    <a href="logout.php">Logout</a>
</div>

<section class="hero">
    <h2>Dashboard Wali Murid</h2>
    <p>Pantau kehadiran anak di bimbingan belajar.</p>
</section>

<section class="cards">

    <div class="card">
        <h3>📊 Absensi Anak</h3>
        <p>Lihat riwayat kehadiran anak.</p>
        <a href="absensi_anak.php">Buka</a>
    </div>

</section>

<footer>© 2025 Sistem Absensi Bimbel</footer>

</body>
</html>