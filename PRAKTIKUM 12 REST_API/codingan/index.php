<?php
session_start();

if (isset($_SESSION['role'])) {
    switch ($_SESSION['role']) {
        case 'admin':
            header("Location: dashboard_admin.php");
            break;
        case 'pengajar':
            header("Location: dashboard_pengajar.php");
            break;
        case 'siswa':
            header("Location: dashboard_siswa.php");
            break;
        case 'wali_murid':
            header("Location: dashboard_wali.php");
            break;
        default:
            header("Location: login.php");
    }
    exit();
} else {
    header("Location: login.php");
    exit();
}
?>