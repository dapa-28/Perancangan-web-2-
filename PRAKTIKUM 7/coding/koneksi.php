<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "upload_foto";

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>