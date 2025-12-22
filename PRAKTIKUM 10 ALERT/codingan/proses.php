<?php
include "koneksi.php";

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

// Ambil data form
$nama        = $_POST['nama'];
$nim         = $_POST['nim'];
$kelas       = $_POST['kelas'];
$prodi       = $_POST['prodi'];
$universitas = $_POST['universitas'];
$email       = $_POST['email'];
$pesan       = $_POST['pesan'];

// Template email
$body = "
<h3>📢 Notifikasi Alert Mahasiswa</h3>
<hr>
<b>Nama</b> : $nama <br>
<b>NIM</b> : $nim <br>
<b>Kelas</b> : $kelas <br>
<b>Prodi</b> : $prodi <br>
<b>Universitas</b> : $universitas <br><br>
<b>Pesan:</b><br>
$pesan
<br><br>
<i>Email ini dikirim otomatis oleh sistem.</i>
";

// Kirim email
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = '***********';
    $mail->Password   = '**********'; // APP PASSWORD
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->setFrom('***********', 'Mail Alert System');
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = 'Alert Data Mahasiswa';
    $mail->Body    = $body;

    $mail->send();

} catch (Exception $e) {
    echo "<script>alert('Email gagal dikirim');window.location='index.php';</script>";
    exit;
}

// Simpan ke database
$simpan = mysqli_query($koneksi, "
    INSERT INTO user_log 
    (nama, nim, kelas, prodi, universitas, email, pesan)
    VALUES
    ('$nama','$nim','$kelas','$prodi','$universitas','$email','$pesan')
");

if ($simpan) {
    echo "<script>alert('Data tersimpan & email terkirim!');window.location='index.php';</script>";
} else {
    echo "<script>alert('Email terkirim tapi data gagal disimpan');window.location='index.php';</script>";
}

?>
