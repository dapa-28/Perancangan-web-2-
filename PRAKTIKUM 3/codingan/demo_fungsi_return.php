<!DOCTYPE html>
<html lang="en">
<head>
    <title>Demo dari Fungsi</title>
</head>
<body>

<?php
// Prosedur
function tampilWaktu() {
    echo "Waktu sekarang adalah: " . date("H:i:s") . "<br>";
}

// Fungsi dengan return
function jumlah($a, $b) {
    return $a + $b;
}

// Fungsi dengan parameter opsional
function cetakTeks($teks, $tebal = true) {
    echo $tebal ? "<b>$teks</b>" : $teks;
}

tampilWaktu();
echo "Hasil dari penjumlahan: " . jumlah(100, 7) . "<br>";
cetakTeks("PHP itu asyik(kali)!"); 
echo "<br>";
cetakTeks("Tanpa huruf ", false);
?>

</body>
</html>