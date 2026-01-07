<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Sistem Absensi Bimbel</title>
    <style>
        body {
            font-family: "Poppins", sans-serif;
            background: url('zenitsu.jpg') no-repeat center center fixed;
            background-size: cover;
            margin: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            backdrop-filter: blur(3px);
        }

        .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.6);
            z-index: 1;
        }

        .login-box {
            position: relative;
            z-index: 2;
            background: rgba(20, 20, 20, 0.9);
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0px 0px 20px rgba(255, 255, 255, 0.1);
            width: 350px;
            color: white;
            text-align: center;
        }

        h2 {
            color: #b8bcbdff;
            margin-bottom: 25px;
        }

        input[type="text"], input[type="password"] {
            width: 90%;
            padding: 10px;
            margin: 10px 0;
            border: none;
            border-radius: 5px;
            outline: none;
            background: #222;
            color: white;
        }

        input[type="submit"] {
            width: 95%;
            padding: 10px;
            background: linear-gradient(90deg, #111213ff, #e6ebecff);
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
            transition: 0.3s;
        }

        input[type="submit"]:hover {
            background: linear-gradient(90deg, #00c3ff, #0078ff);
        }

        .footer {
            margin-top: 15px;
            font-size: 12px;
            color: #aaa;
        }

        /* Tombol daftar */
        .register-link {
            margin-top: 15px;
            font-size: 14px;
        }
        .register-link a {
            color: #00c3ff;
            text-decoration: none;
        }
        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="overlay"></div>
    <div class="login-box">
        <h2>Login Absensi Bimbel</h2>

        <form action="proses_login.php" method="POST">
            <input type="text" name="username" placeholder="Username" required><br>
            <input type="password" name="password" placeholder="Password" required><br>
            <input type="submit" value="Login">
        </form>

        <!-- Tombol daftar -->
        <div class="register-link">
            Belum punya akun? <a href="form_pengguna.php">Daftar</a>
        </div>

        <div class="footer">
            © 2025 Sistem Absensi Bimbel
        </div>
    </div>
</body>
</html>