<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Registrasi Pengguna Baru</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f6f8ff;
            padding: 30px;
        }
        h2 {
            color: #1a73e8;
            text-align: center;
            margin-bottom: 20px;
        }
        form {
            background-color: #ffffff;
            border-radius: 10px;
            padding: 20px 30px;
            max-width: 550px;
            margin: auto;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        table { width: 100%; }
        td { padding: 8px; }
        input[type="text"],
        input[type="password"],
        input[type="email"],
        select {
            width: 100%;
            padding: 10px;
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
            width: 100%;
        }
        input[type="submit"]:hover {
            background-color: #155ab6;
        }

        .login-link {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }
        .login-link a {
            color: #1a73e8;
            text-decoration: none;
        }
        .login-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

    <h2>Registrasi Pengguna Baru</h2>

    <form action="proses_register.php" method="post">
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
                <td>Nama Lengkap</td>
                <td><input type="text" name="nama" required></td>
            </tr>
            <tr>
                <td>Email</td>
                <td><input type="email" name="email" required></td>
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
                <td><input type="submit" value="Daftar"></td>
            </tr>
        </table>
    </form>

    <div class="login-link">
        Sudah punya akun? <a href="login.php">Login di sini</a>
    </div>

</body>
</html>