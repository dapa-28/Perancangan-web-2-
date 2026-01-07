<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'admin') {
    header("Location: login.php");
    exit();
}
require_once './koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard Admin - Absensi Bimbel</title>
<style>
body {
    margin: 0;
    font-family: "Segoe UI", sans-serif;
    background-color: #f5f8ff;
}

/* Navbar */
.navbar {
    background: rgba(29, 32, 27, 0.95);
    color: white;
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 18px 40px;
    box-shadow: 0 2px 12px rgba(0,0,0,0.1);
    position: sticky;
    top: 0;
}
.navbar a {
    color: white;
    text-decoration: none;
    font-weight: bold;
    margin-left: 25px;
}

/* Hero */
.hero {
    background: linear-gradient(to right, rgba(159,161,167,0.9), rgba(207,223,253,0.5)),
                url('koala.jpg') center/cover no-repeat;
    color: white;
    padding: 100px 60px;
}
.hero h2 {
    font-size: 40px;
}
.hero p {
    font-size: 18px;
    max-width: 600px;
}
.hero .btn {
    display: inline-block;
    margin-top: 20px;
    background: white;
    color: #121314;
    padding: 12px 24px;
    border-radius: 8px;
    text-decoration: none;
    font-weight: bold;
}

/* Cards */
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
    transition: 0.3s;
}
.card:hover {
    transform: translateY(-8px);
}
.card h3 {
    margin-bottom: 10px;
}
.card p {
    font-size: 14px;
    color: #444;
}
.card a {
    display: inline-block;
    background: #0d0d0e;
    color: white;
    padding: 8px 16px;
    border-radius: 8px;
    text-decoration: none;
}

/* Footer */
footer {
    text-align: center;
    padding: 20px;
    background: #121213;
    color: white;
}
</style>
</head>
<body>

<!-- Navbar -->
<div class="navbar">
    <div>
        👋 Hai, <b><?= htmlspecialchars($_SESSION['nama']) ?></b>
        (Admin)
    </div>
    <div>
        <a href="logout.php">Logout</a>
    </div>
</div>

<!-- Hero -->
<section class="hero">
    <h2>Dashboard Admin</h2>
    <p>Kelola seluruh data sistem absensi bimbingan belajar secara terpusat dan efisien.</p>
    <a href="#menu" class="btn">Kelola Data</a>
</section>

<!-- Menu -->
<section id="menu" class="cards">

    <div class="card">
        <h3>👥 Data Pengguna</h3>
        <p>Tambah, edit, dan hapus akun.</p>
        <a href="seleksi_pengguna.php">Buka</a>
    </div>

    <div class="card">
        <h3>📚 Data Siswa</h3>
        <p>Kelola data siswa bimbel.</p>
        <a href="data_siswa.php">Buka</a>
    </div>

    <div class="card">
        <h3>🧑‍🏫 Data Pengajar</h3>
        <p>Kelola data pengajar.</p>
        <a href="data_pengajar.php">Buka</a>
    </div>

    <div class="card">
        <h3>🗓 Absensi</h3>
        <p>Input & rekap absensi.</p>
        <a href="absensi_admin.php">Buka</a>
    </div>

    <div class="card">
        <h3>📈 Laporan</h3>
        <p>Lihat & cetak laporan.</p>
        <a href="laporan_admin.php">Buka</a>
    </div>

</section>

<footer>
© 2025 Sistem Absensi Bimbel
</footer>

</body>
</html>