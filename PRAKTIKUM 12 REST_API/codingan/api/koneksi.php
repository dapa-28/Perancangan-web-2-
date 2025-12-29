<?php
header("Content-Type: application/json");

$server = "localhost";
$user = "root";
$password = "";
$database = "absensi_bimbel";

$conn = mysqli_connect($server, $user, $password, $database);

if (!$conn) {
    http_response_code(500);
    echo json_encode(["status"=>false,"message"=>"Koneksi database gagal"]);
    exit();
}
?>