<!DOCTYPE html>
<html>
<head>
    <title>Upload Foto ke Database</title>

    <style>
        /* Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: "Poppins", sans-serif;
        }

        body {
            background: #f5f7fa;
            padding: 30px;
        }

        .container {
            width: 400px;
            margin: auto;
            background: #ffffff;
            padding: 25px;
            border-radius: 15px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
        }

        h2 {
            text-align: center;
            margin-bottom: 20px;
            color: #333;
        }

        label {
            font-weight: 600;
            display: block;
            margin-bottom: 6px;
            color: #444;
        }

        input[type="text"],
        input[type="file"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 8px;
            border: 1px solid #ccc;
            transition: 0.3s;
        }

        input[type="text"]:focus,
        input[type="file"]:focus {
            border-color: #6a5acd;
            outline: none;
        }

        button {
            width: 100%;
            background: #67e7ddff;
            padding: 12px;
            font-size: 16px;
            color: white;
            border: none;
            border-radius: 8px;
            cursor: pointer;
            transition: 0.3s;
        }

        button:hover {
            background: #5848c2;
        }
    </style>
</head>
<body>

<div class="container">
    <h2>Upload Foto</h2>

    <form action="upload.php" method="post" enctype="multipart/form-data">
        <label>Nama:</label>
        <input type="text" name="nama" required>

        <label>Pilih Foto:</label>
        <input type="file" name="foto" required>

        <button type="submit">Upload</button>
    </form>
</div>

</body>
</html>