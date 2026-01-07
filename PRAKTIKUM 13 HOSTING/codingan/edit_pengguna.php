<?php
require_once './koneksi.php';

// Cek apakah ID dikirim dari link
if (!isset($_GET['id'])) {
    die("❌ ID pengguna tidak ditemukan.");
}

$id_user = $_GET['id'];

// Ambil data lama dari database
$sql = "SELECT * FROM pengguna WHERE id_user = '$id_user'";
$res = mysqli_query($conn, $sql);
$data = mysqli_fetch_assoc($res);

if (!$data) {
    die("❌ Data pengguna tidak ditemukan.");
}

// Proses jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $status_akun = $_POST['status_akun'];

    $update = "UPDATE pengguna SET 
                username = '$username',
                password = '$password',
                role = '$role',
                nama = '$nama',
                email = '$email',
                status_akun = '$status_akun'
               WHERE id_user = '$id_user'";

    if (mysqli_query($conn, $update)) {
        echo "<script>alert('✅ Data berhasil diperbarui!');window.location='seleksi_pengguna.php';</script>";
    } else {
        echo "<p style='color:red;'>❌ Gagal memperbarui data: " . mysqli_error($conn) . "</p>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Pengguna</title>
    <style>
        body {font-family:'Segoe UI',sans-serif;background:#f3f6fa;padding:20px;}
        form {
            width:400px;margin:auto;background:white;padding:20px;border-radius:10px;
            box-shadow:0 2px 8px rgba(0,0,0,0.1);
        }
        h2 {text-align:center;color:#2d6cdf;}
        table {width:100%;}
        td {padding:8px;}
        input,select {
            width:100%;padding:8px;border:1px solid #ccc;border-radius:6px;
        }
        input[type=submit] {
            background:#2d6cdf;color:white;border:none;cursor:pointer;
        }
        input[type=submit]:hover {background:#1c4cb8;}
    </style>
</head>
<body>

<h2>Edit Data Pengguna</h2>

<form method="post">
    <table>
        <tr><td>Username</td><td><input type="text" name="username" value="<?= $data['username'] ?>" required></td></tr>
        <tr><td>Password</td><td><input type="text" name="password" value="<?= $data['password'] ?>" required></td></tr>
        <tr>
            <td>Role</td>
            <td>
                <select name="role" required>
                    <option value="">-- Pilih Role --</option>
                    <option value="admin" <?= $data['role']=='admin'?'selected':'' ?>>Admin</option>
                    <option value="pengajar" <?= $data['role']=='pengajar'?'selected':'' ?>>Pengajar</option>
                    <option value="siswa" <?= $data['role']=='siswa'?'selected':'' ?>>Siswa</option>
                    <option value="wali_murid" <?= $data['role']=='wali_murid'?'selected':'' ?>>Wali Murid</option>
                </select>
            </td>
        </tr>
        <tr><td>Nama</td><td><input type="text" name="nama" value="<?= $data['nama'] ?>" required></td></tr>
        <tr><td>Email</td><td><input type="email" name="email" value="<?= $data['email'] ?>" required></td></tr>
        <tr>
            <td>Status Akun</td>
            <td>
                <select name="status_akun" required>
                    <option value="aktif" <?= $data['status_akun']=='aktif'?'selected':'' ?>>Aktif</option>
                    <option value="nonaktif" <?= $data['status_akun']=='nonaktif'?'selected':'' ?>>Nonaktif</option>
                </select>
            </td>
        </tr>
        <tr><td></td><td><input type="submit" value="Perbarui"></td></tr>
    </table>
</form>

</body>
</html>