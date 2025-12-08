<!DOCTYPE html>
<html>
<head>
    <title>Daftar Foto</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f5f7fa;
            padding: 20px;
        }

        .btn-add {
            display: inline-block;
            padding: 10px 20px;
            background: #78c3f5ff;
            color: white;
            border-radius: 5px;
            text-decoration: none;
            font-weight: bold;
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            background: white;
            border-radius: 10px;
            overflow: hidden;
        }

        th {
            background: #5db9eeff;
            color: white;
            padding: 12px;
        }

        td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: center;
        }

        img {
            width: 100px;
            border-radius: 8px;
        }

        .btn-delete {
            padding: 7px 15px;
            background: #e63946;
            color: white;
            border-radius: 5px;
            text-decoration: none;
        }

        .btn-delete:hover {
            background: #c53030;
        }

        /* PAGINATION */
        .pagination {
            text-align: center;
            margin-top: 20px;
        }

        .pagination a {
            margin: 0 5px;
            padding: 8px 12px;
            background: #e0e0e0;
            border-radius: 5px;
            text-decoration: none;
            color: #333;
        }

        .pagination a.active {
            background: #68c6ebff;
            color: white;
        }

        .pagination a.disabled {
            opacity: 0.4;
            pointer-events: none;
        }

    </style>
</head>
<body>

<a href="index.php" class="btn-add">+ Tambah Foto</a>

<?php
include "koneksi.php";

/* ============ PAGINATION ============ */
$perPage = 3; // per halaman 3 foto
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$start = ($page - 1) * $perPage;

/* ambil data */
$result = mysqli_query($conn, "SELECT * FROM foto LIMIT $start, $perPage");

/* hitung total */
$totalData = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM foto"));
$totalPage = ceil($totalData / $perPage);

/* ============ TABEL ============ */
echo "<table>
        <tr>
            <th>No</th>
            <th>Nama Foto</th>
            <th>Foto</th>
            <th>Tanggal Upload</th>
            <th>Aksi</th>
        </tr>";

$no = $start + 1;

while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>".$no++."</td>";
    echo "<td>".$row['nama']."</td>";
    echo "<td><img src='uploads/".$row['foto']."'></td>";
    echo "<td>".$row['tanggal']."</td>";
    echo "<td>
            <a class='btn-delete' 
               onclick='return confirm(\"Yakin ingin menghapus?\")'
               href='delete.php?id=".$row['id']."'>
               Hapus
            </a>
          </td>";
    echo "</tr>";
}

echo "</table>";

/* ============ PAGINATION ============ */
echo "<div class='pagination'>";

/* Tombol PREV */
if ($page > 1) {
    $prev = $page - 1;
    echo "<a href='tampil.php?page=$prev'>&laquo; Prev</a>";
} else {
    echo "<a class='disabled'>&laquo; Prev</a>";
}

/* Nomor halaman */
for ($i = 1; $i <= $totalPage; $i++) {
    echo "<a href='tampil.php?page=$i' class='".($i==$page?'active':'')."'>$i</a>";
}

/* Tombol NEXT */
if ($page < $totalPage) {
    $next = $page + 1;
    echo "<a href='tampil.php?page=$next'>Next &raquo;</a>";
} else {
    echo "<a class='disabled'>Next &raquo;</a>";
}

echo "</div>";
?>

</body>
</html>