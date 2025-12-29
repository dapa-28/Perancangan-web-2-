<?php

require_once './koneksi.php';

$sql = "SELECT * FROM pengguna";
$res = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Data Pengguna - Sistem Absensi Bimbel</title>
    <style>
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f3f6fa;
            margin: 0;
            padding: 20px;
        }
        h2 {
            text-align: center;
            color: #2d6cdf;
        }
        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            box-shadow: 0 2px 10px rgba(0,0,0,0.1);
            background: white;
            border-radius: 10px;
            overflow: hidden;
        }
        th {
            background-color: #2d6cdf;
            color: white;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            padding: 12px;
        }
        td {
            padding: 10px;
            text-align: center;
            border-bottom: 1px solid #e0e0e0;
        }
        tr:hover {
            background-color: #f1f7ff;
        }
        .aksi a {
            text-decoration: none;
            padding: 6px 10px;
            border-radius: 6px;
            color: white;
            font-size: 14px;
        }
        .edit {
            background: #4caf50;
        }
        .hapus {
            background: #f44336;
        }
        .tambah-btn {
            display: inline-block;
            background: #2d6cdf;
            color: white;
            padding: 10px 15px;
            text-decoration: none;
            border-radius: 8px;
            margin: 10px 5%;
        }
        .tambah-btn:hover {
            background: #1c4cb8;
        }
        .kosong {
            text-align: center;
            color: #999;
            font-style: italic;
        }
    </style>
</head>
<body>

    <h2>Data Pengguna Sistem Absensi Bimbel</h2>

    <a href="form_pengguna.php" class="tambah-btn">+ Tambah Pengguna</a>

    <?php
    if ($res) {
        if (mysqli_num_rows($res) > 0) {
            echo "<table>
                    <tr>
                        <th>#</th>
                        <th>ID User</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Role</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Status Akun</th>
                        <th>Aksi</th>
                    </tr>";
            
            $i = 1;
            while ($row = mysqli_fetch_assoc($res)) {
                $tampil_role = ucwords(str_replace('_', ' ', $row['role']));
                echo "<tr>
                        <td>{$i}</td>
                        <td>{$row['id_user']}</td>
                        <td>{$row['username']}</td>
                        <td>{$row['password']}</td>
                        <td>{$tampil_role}</td>
                        <td>{$row['nama']}</td>
                        <td>{$row['email']}</td>
                        <td>{$row['status_akun']}</td>
                        <td class='aksi'>
                            <a class='edit' href='edit_pengguna.php?id={$row['id_user']}'>Edit</a>
                            <a class='hapus' href='hapus_pengguna.php?id={$row['id_user']}' 
                               onclick=\"return confirm('Yakin ingin menghapus data ini?');\">Hapus</a>
                        </td>
                      </tr>";
                $i++;
            }
            echo "</table>";
        } else {
            echo "<p class='kosong'>Belum ada data pengguna.</p>";
        }
    } else {
        echo "<p style='color:red;'>❌ Gagal mengambil data: " . mysqli_error($conn) . "</p>";
    }

    mysqli_close($conn);
    ?>

</body>
</html>