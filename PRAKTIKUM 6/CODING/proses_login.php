<?php
session_start();
require_once './koneksi.php';

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM pengguna WHERE username='$username' AND password='$password' LIMIT 1";
$res = mysqli_query($conn, $sql);

if ($res && mysqli_num_rows($res) > 0) {

    $user = mysqli_fetch_assoc($res);

    $_SESSION['id_user'] = $user['id_user'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['nama'] = $user['nama'];
    $_SESSION['role'] = $user['role'];

    header("Location: dashboard.php");
    exit();

} else {
    echo "<script>
            alert('Username atau password salah!');
            window.location='login.php';
          </script>";
}
?>