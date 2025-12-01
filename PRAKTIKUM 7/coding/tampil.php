<!DOCTYPE html>
<html>
<head>
    <title>Tampil Foto</title>
    <style>
        body {
            background: #f5f7fa;
            padding: 20px;
            font-family: Poppins, sans-serif;
        }

        .top-bar {
            width: 250px;
            margin: 0 auto 20px auto;
            text-align: center;
        }

        .btn-add {
            display: inline-block;
            padding: 10px 20px;
            background: #4caf50;
            color: white;
            border-radius: 8px;
            text-decoration: none;
            font-weight: bold;
            transition: 0.3s;
        }

        .btn-add:hover {
            background: #43a047;
        }

        .foto-card {
            background: white;
            padding: 15px;
            border-radius: 12px;
            width: 250px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            margin: 20px auto;
            text-align: center;
        }

        img {
            width: 100%;
            border-radius: 10px;
        }

        .btn-delete {
            padding: 8px 15px;
            background:#e63946;
            color:white;
            border-radius:8px;
            text-decoration:none;
        }

        .btn-delete:hover {
            background:#c53030;
        }

    </style>
</head>
<body>

<!-- Tombol Tambah Foto -->
<div class="top-bar">
    <a href="index.php" class="btn-add">+ Tambah Foto</a>
</div>

<?php
include "koneksi.php";

$result = mysqli_query($conn, "SELECT * FROM foto");

while ($row = mysqli_fetch_assoc($result)) {
    echo "<div class='foto-card'>";
    echo "<h4>".$row['nama']."</h4>";
    echo "<img src='uploads/".$row['foto']."' alt='Foto'> <br><br>";

    echo "<a class='btn-delete' 
            href='delete.php?id=".$row['id']."'
            onclick='return confirm(\"Yakin ingin menghapus foto ini?\")'>
            Delete
          </a>";

    echo "</div>";
}
?>

</body>
</html>