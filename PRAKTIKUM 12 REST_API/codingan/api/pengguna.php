<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type");

include "../koneksi.php";

$method = $_SERVER['REQUEST_METHOD'];

switch ($method) {

    // ================= GET =================
    case 'GET':
        if (isset($_GET['id_user'])) {
            $id = $_GET['id_user'];
            $q = mysqli_query($conn, "SELECT id_user, username, role, nama, email, status_akun FROM pengguna WHERE id_user='$id'");
            $data = mysqli_fetch_assoc($q);

            if ($data) {
                echo json_encode($data);
            } else {
                http_response_code(404);
                echo json_encode(["message" => "Pengguna tidak ditemukan"]);
            }
        } else {
            $q = mysqli_query($conn, "SELECT id_user, username, role, nama, email, status_akun FROM pengguna");
            $data = [];
            while ($row = mysqli_fetch_assoc($q)) {
                $data[] = $row;
            }
            echo json_encode($data);
        }
        break;

    // ================= POST =================
    case 'POST':
        $input = json_decode(file_get_contents("php://input"), true);

        $id     = $input['id_user'];
        $user   = $input['username'];
        $pass   = password_hash($input['password'], PASSWORD_DEFAULT);
        $role   = $input['role'];
        $nama   = $input['nama'];
        $email  = $input['email'];
        $status = $input['status_akun'];

        $q = mysqli_query($conn, "INSERT INTO pengguna
            (id_user, username, password, role, nama, email, status_akun)
            VALUES ('$id','$user','$pass','$role','$nama','$email','$status')");

        if ($q) {
            http_response_code(201);
            echo json_encode(["message" => "Pengguna berhasil ditambahkan"]);
        } else {
            http_response_code(500);
            echo json_encode(["message" => "Gagal menambah pengguna"]);
        }
        break;

    // ================= PUT =================
    case 'PUT':
        if (!isset($_GET['id_user'])) {
            http_response_code(400);
            echo json_encode(["message" => "id_user wajib diisi"]);
            exit;
        }

        $id = $_GET['id_user'];
        $input = json_decode(file_get_contents("php://input"), true);

        $q = mysqli_query($conn, "UPDATE pengguna SET
            username='{$input['username']}',
            role='{$input['role']}',
            nama='{$input['nama']}',
            email='{$input['email']}',
            status_akun='{$input['status_akun']}'
            WHERE id_user='$id'");

        echo $q
            ? json_encode(["message" => "Pengguna berhasil diupdate"])
            : json_encode(["message" => "Gagal update pengguna"]);
        break;

    // ================= DELETE =================
    case 'DELETE':
        if (!isset($_GET['id_user'])) {
            http_response_code(400);
            echo json_encode(["message" => "id_user wajib diisi"]);
            exit;
        }

        $id = $_GET['id_user'];
        $q = mysqli_query($conn, "DELETE FROM pengguna WHERE id_user='$id'");

        echo $q
            ? json_encode(["message" => "Pengguna berhasil dihapus"])
            : json_encode(["message" => "Gagal menghapus pengguna"]);
        break;

    default:
        http_response_code(405);
        echo json_encode(["message" => "Method tidak diizinkan"]);
}