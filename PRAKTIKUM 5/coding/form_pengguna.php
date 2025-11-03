<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Tambah Pengguna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f6f8ff;
            padding: 30px;
        }
        h2 {
            color: #1a73e8;
            text-align: left;
        }
        form {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px 30px;
            max-width: 550px;
            margin: auto;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        table {
            width: 100%;
        }
        td {
            padding: 8px;
        }
        input[type="text"],
        input[type="password"],
        input[type="email"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
        }
        input[type="submit"] {
            background-color: #1a73e8;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 5px;
            font-size: 14px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #155ab6;
        }
        .back-link {
            display: inline-block;
            margin-top: 15px;
            text-decoration: none;
            color: #1a73e8;
            font-size: 14px;
        }
        .back-link:hover {
            text-decoration: underline;
        }
        p {
            text-align: center;
            font-weight: bold;
        }
    </style>
</head>
<body>
    <h2>Form Tambah Data Pengguna</h2>
    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post">
        <table>
            <tr>
                <td>ID User</td>
                <td><input type="text" name="id_user" required></td>
            </tr>
            <tr>
                <td>Username</td>
                <td><input type="text" name="username" required></td>
            </tr>
            <tr>
                <td>Password</td>
                <td><input type="password" name="password" required></td>
            </tr>
            <tr>
                <td>Role</td>
                <td>
                    <select name="role" required>
                        <option value="">-- Pilih Role --</option>
                        <option value="admin">Admin</option>
                        <option value="pengajar">Pengajar</option>
                        <option value="siswa">Siswa</option>
                        <option value="wali_murid">Wali Murid</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Nama</td>
                <td><input type="text" name="nama" size="40" required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" size="40" required></td>
            </tr>
            <tr>
                <td>Status Akun</td>
                <td>
                    <select name="status_akun" required>
                        <option value="aktif">Aktif</option>
                        <option value="nonaktif">Nonaktif</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type="submit" value="Simpan"></td>
            </tr>
        </table>
    </form>

    <a href="seleksi_pengguna.php" class="back-link">← Kembali ke Data Pengguna</a>

    <?php
    require_once './koneksi.php';

    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $id_user = $_POST['id_user'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $nama = $_POST['nama'];
        $email = $_POST['email'];
        $status_akun = $_POST['status_akun'];

        
        $sql = "INSERT INTO pengguna (id_user, username, password, role, nama, email, status_akun)
                VALUES ('$id_user', '$username', '$password', '$role', '$nama', '$email', '$status_akun')";

        $res = mysqli_query($conn, $sql);

        if ($res) {
            echo "<p style='color:green;'>✅ Data pengguna berhasil ditambahkan.</p>";
        } else {
            echo "<p style='color:red;'>❌ Gagal menambah data: " . mysqli_error($conn) . "</p>";
        }
    }

    mysqli_close($conn);
    ?>
</body>
</html>