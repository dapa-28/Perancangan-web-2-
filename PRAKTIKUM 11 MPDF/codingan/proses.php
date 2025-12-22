<?php
include "koneksi.php";

// Load FPDF dari folder fpdf/
require __DIR__ . '/fpdf/fpdf.php';
define('FPDF_FONTPATH', __DIR__ . '/fpdf/font/');

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';
require 'PHPMailer/Exception.php';

/* Ambil Data Form */
$nama        = $_POST['nama'];
$nim         = $_POST['nim'];
$kelas       = $_POST['kelas'];
$prodi       = $_POST['prodi'];
$universitas = $_POST['universitas'];
$email       = $_POST['email'];
$pesan       = $_POST['pesan'];

/* Simpan ke Database */
mysqli_query($koneksi, "
INSERT INTO user_log 
(nama, nim, kelas, prodi, universitas, email, pesan)
VALUES
('$nama','$nim','$kelas','$prodi','$universitas','$email','$pesan')
");

/* Ambil data terakhir untuk PDF */
$data = mysqli_query($koneksi,"SELECT * FROM user_log ORDER BY id DESC LIMIT 1");
$row = mysqli_fetch_assoc($data);

/* Buat PDF */
$pdf = new FPDF();
$pdf->AddPage();
$pdf->SetFont('Arial','B',14);
$pdf->Cell(0,10,'Laporan Sistem Reminder',0,1,'C');
$pdf->Ln(5);

$pdf->SetFont('Arial','',10);
$pdf->Cell(50,8,'Nama',0);
$pdf->Cell(5,8,':',0);
$pdf->Cell(0,8,$row['nama'],0,1);

$pdf->Cell(50,8,'NIM',0);
$pdf->Cell(5,8,':',0);
$pdf->Cell(0,8,$row['nim'],0,1);

$pdf->Cell(50,8,'Kelas',0);
$pdf->Cell(5,8,':',0);
$pdf->Cell(0,8,$row['kelas'],0,1);

$pdf->Cell(50,8,'Program Studi',0);
$pdf->Cell(5,8,':',0);
$pdf->Cell(0,8,$row['prodi'],0,1);

$pdf->Cell(50,8,'Universitas',0);
$pdf->Cell(5,8,':',0);
$pdf->Cell(0,8,$row['universitas'],0,1);

$pdf->Cell(50,8,'Waktu',0);
$pdf->Cell(5,8,':',0);
$pdf->Cell(0,8,$row['waktu'],0,1);

$pdf->Ln(5);
$pdf->MultiCell(0,8,"Pesan:\n".$row['pesan']);

$file_pdf = "laporan_".$row['nim'].".pdf";
$pdf->Output("F",$file_pdf); // simpan sementara

/* Kirim Email dengan PDF */
$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = '**********';
    $mail->Password   = '********';
    $mail->SMTPSecure = 'tls';
    $mail->Port       = 587;

    $mail->setFrom('**********', 'Sistem Reminder');
    $mail->addAddress($email);

    $mail->Subject = 'Notifikasi Sistem Reminder';
    $mail->Body    = 'Data Anda telah tersimpan. Laporan terlampir dalam bentuk PDF.';
    $mail->addAttachment($file_pdf);

    $mail->send();

    if(file_exists($file_pdf)){
        unlink($file_pdf); // hapus PDF sementara
    }

    echo "<script>alert('Data tersimpan & email PDF terkirim!');window.location='index.php';</script>";

} catch (Exception $e) {
    echo "Email gagal: {$mail->ErrorInfo}";
}

?>
