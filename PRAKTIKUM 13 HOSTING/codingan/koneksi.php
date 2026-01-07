<?php
$server = "localhost";
$user = "root";
$password = "";
$database = "absensi_bimbel";

$conn = mysqli_connect($server, $user, $password, $database);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>