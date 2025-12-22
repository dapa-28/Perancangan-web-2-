<!DOCTYPE html>
<html>
<head>
    <title>Mail Alert Mahasiswa</title>
</head>
<body>

<h2>Form Alert Mahasiswa</h2>

<form method="post" action="proses.php">
    Nama <br>
    <input type="text" name="nama" required><br><br>

    NIM <br>
    <input type="text" name="nim" required><br><br>

    Kelas <br>
    <input type="text" name="kelas" required><br><br>

    Prodi <br>
    <input type="text" name="prodi" required><br><br>

    Universitas <br>
    <input type="text" name="universitas" required><br><br>

    Email Tujuan <br>
    <input type="email" name="email" required><br><br>

    Pesan <br>
    <textarea name="pesan" required></textarea><br><br>

    <button type="submit">Kirim Alert</button>
</form>

</body>
</html>