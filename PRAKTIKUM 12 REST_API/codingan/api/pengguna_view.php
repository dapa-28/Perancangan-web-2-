<?php
// Ambil data dari API
$url = "http://localhost:8080/P5/api/pengguna.php";
$data = json_decode(file_get_contents($url), true);
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>API Pengguna - View</title>
<style>
body {
    font-family: Arial, sans-serif;
    background: #f4f6f8;
    padding: 30px;
}
h2 {
    text-align: center;
}
.endpoint {
    text-align: center;
    margin-bottom: 20px;
    color: #555;
}
table {
    border-collapse: collapse;
    width: 90%;
    margin: auto;
    background: white;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
}
th, td {
    padding: 12px;
    border: 1px solid #ddd;
    text-align: center;
}
th {
    background: #1e1e2f;
    color: white;
}
tr:nth-child(even) {
    background: #f9f9f9;
}
.json-link {
    display: block;
    text-align: center;
    margin-top: 20px;
}
.json-link a {
    text-decoration: none;
    color: #1a73e8;
    font-weight: bold;
}
</style>
</head>
<body>

<h2>Data Pengguna (API View)</h2>

<div class="endpoint">
    Endpoint API: <b>/api/pengguna.php</b>
</div>

<table>
<tr>
    <th>ID User</th>
    <th>Username</th>
    <th>Role</th>
    <th>Nama</th>
    <th>Email</th>
    <th>Status</th>
</tr>

<?php if (is_array($data)): ?>
    <?php foreach ($data as $row): ?>
    <tr>
        <td><?= htmlspecialchars($row['id_user']) ?></td>
        <td><?= htmlspecialchars($row['username']) ?></td>
        <td><?= htmlspecialchars($row['role']) ?></td>
        <td><?= htmlspecialchars($row['nama']) ?></td>
        <td><?= htmlspecialchars($row['email']) ?></td>
        <td><?= htmlspecialchars($row['status_akun']) ?></td>
    </tr>
    <?php endforeach; ?>
<?php else: ?>
<tr>
    <td colspan="6">Data tidak tersedia</td>
</tr>
<?php endif; ?>

</table>

<div class="json-link">
    🔍 <a href="pengguna.php" target="_blank">Lihat JSON Asli</a>
</div>

</body>
</html>