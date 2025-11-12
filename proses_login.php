<?php
session_start();
include 'koneksi.php';
$username = $_POST['username'];
$password = $_POST['password'];
$sql = "SELECT * FROM users WHERE username='$username' AND password='$password'";
$result = mysqli_query($mysqli, $sql);
if (mysqli_num_rows($result) > 0) {
    $data = mysqli_fetch_assoc($result);
    $_SESSION['username'] = $data['username'];
    $_SESSION['role'] = $data['role'];
    if ($data['role'] == 'pemilik') {
        header("Location: dashboard_pemilik.php");
    } elseif ($data['role'] == 'kasir') {
        header("Location: dashboard_kasir.php");
    } elseif ($data['role'] == 'gudang') {
        header("Location: dashboard_gudang.php");
    }
    exit();
} else {
    echo "<script>alert('Username atau Password salah!'); window.location='index.php';</script>";
}
?>
