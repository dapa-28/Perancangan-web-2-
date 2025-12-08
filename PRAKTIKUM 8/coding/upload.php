<?php
include "koneksi.php";

$nama = $_POST['nama'];
$foto = $_FILES['foto']['name'];
$target = "uploads/" . basename($foto);

// pindahkan file ke folder uploads
if (move_uploaded_file($_FILES['foto']['tmp_name'], $target)) {
    $sql = "INSERT INTO foto (nama, foto) VALUES ('$nama', '$foto')";
    mysqli_query($conn, $sql);

    echo "Foto berhasil diupload! <br><a href='tampil.php'>Lihat Foto</a>";
} else {
    echo "Upload gagal!";
}
?>