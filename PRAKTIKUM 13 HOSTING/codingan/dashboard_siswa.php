<?php
session_start();
if (!isset($_SESSION['username']) || $_SESSION['role'] != 'siswa') {
    header("Location: login.php");
    exit();
}
require_once './koneksi.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Dashboard Siswa - Absensi Bimbel</title>
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
        (Siswa)
    </div>
    <div>
        <a href="logout.php">Logout</a>
    </div>
</div>

<!-- Hero -->
<section class="hero">
    <h2>Dashboard Siswa</h2>
    <p>Pantau absensi dan informasi bimbingan belajar Anda secara realtime dan mudah.</p>
    <a href="#menu" class="btn">Lihat Menu</a>
</section>

<!-- Menu -->
<section id="menu" class="cards">

    <div class="card">
        <h3>👤 Profil Saya</h3>
        <p>Lihat data akun pribadi Anda.</p>
        <a href="profil_siswa.php">Buka</a>
    </div>

    <div class="card">
        <h3>🗓 Absensi Saya</h3>
        <p>Lihat riwayat kehadiran.</p>
        <a href="absensi_siswa.php">Buka</a>
    </div>

    <div class="card">
        <h3>📅 Jadwal Bimbel</h3>
        <p>Lihat jadwal kelas Anda.</p>
        <a href="jadwal_siswa.php">Buka</a>
    </div>

</section>

<footer>
© 2025 Sistem Absensi Bimbel
</footer>

</body>
</html>