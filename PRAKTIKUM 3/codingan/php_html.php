<!DOCTYPE html>
<html lang="en">
<head>
    <title>PHP dan HTML</title>
</head>
<body>

<h1>ini Contoh Kombinasi HTML dan PHP</h1>

<?php
echo "Ini teks dari Php!<br>";
echo "Hari ini tanggal: " . date("d-m-Y") . "<br>";
?>

<p>Ini paragraf HTML yang biasanya.</p>

<?php
$nama = "Daffa AR";
echo "Nama saya adalah $nama.";
?>

</body>
</html>