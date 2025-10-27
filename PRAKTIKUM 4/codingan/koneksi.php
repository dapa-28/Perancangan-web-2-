<?php
// Koneksi ke database
$host = "localhost";
$user = "root";
$pass = "";
$db   = "absensi";

$koneksi = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Ambil data dari form
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama_siswa = $_POST['nama_siswa'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $no_hp = $_POST['no_hp'];
    $alamat = $_POST['alamat'];

    // Simpan ke tabel siswa
    $query = "INSERT INTO siswa (nama_siswa, jenis_kelamin, no_hp, alamat)
              VALUES ('$nama_siswa', '$jenis_kelamin', '$no_hp', '$alamat')";

    if (mysqli_query($koneksi, $query)) {
        echo "Data berhasil disimpan!<br>";
        echo "<a href='form_siswa.html'>Kembali ke Form</a>";
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
    }
}

mysqli_close($koneksi);
?>