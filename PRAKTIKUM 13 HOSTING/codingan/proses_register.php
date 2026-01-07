<?php
require_once './koneksi.php';

$id_user     = $_POST['id_user'];
$username    = $_POST['username'];
$password    = $_POST['password'];
$role        = $_POST['role'];
$nama        = $_POST['nama'];
$email       = $_POST['email'];
$status_akun = $_POST['status_akun'];

$sql = "INSERT INTO pengguna (id_user, username, password, role, nama, email, status_akun)
        VALUES ('$id_user', '$username', '$password', '$role', '$nama', '$email', '$status_akun')";

if (mysqli_query($conn, $sql)) {
    echo "<script>
            alert('Registrasi berhasil! Silakan login.');
            window.location='login.php';
          </script>";
} else {
    echo "Error: " . mysqli_error($conn);
}
?>