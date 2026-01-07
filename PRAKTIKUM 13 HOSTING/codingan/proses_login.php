<?php
session_start();
require_once __DIR__ . '/koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$q = mysqli_query($conn,"
    SELECT * FROM pengguna
    WHERE username='$username' AND password='$password' AND status_akun='aktif'
");

if (mysqli_num_rows($q) > 0) {
    $data = mysqli_fetch_assoc($q);

    $_SESSION['id_user'] = $data['id_user'];
    $_SESSION['username'] = $data['username'];
    $_SESSION['nama'] = $data['nama'];
    $_SESSION['role'] = $data['role'];

    if ($data['role'] == 'admin') {
        header("Location: dashboard_admin.php");
    } elseif ($data['role'] == 'pengajar') {
        header("Location: dashboard_pengajar.php");
    } elseif ($data['role'] == 'siswa') {
        header("Location: dashboard_siswa.php");
    } elseif ($data['role'] == 'wali_murid') {
        header("Location: dashboard_wali.php");
    }
    exit();
} else {
    echo "<script>alert('Login gagal');window.location='login.php';</script>";
}