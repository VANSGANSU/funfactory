<?php
session_start();
$koneksi = new mysqli("localhost", "root", "", "user_login");

$username = $_POST['username'];
$password = $_POST['password'];

$sql = "SELECT * FROM admin WHERE username='$username' LIMIT 1";
$result = $koneksi->query($sql);

if ($result->num_rows > 0) {
    $admin = $result->fetch_assoc();

    if (password_verify($password, $admin['password'])) {
        $_SESSION['admin'] = $admin['username'];
        header("Location: admin_dashboard.php");
        exit;
    } else {
        echo "<script>alert('Password salah!'); window.location='admin_login.php';</script>";
    }
} else {
    echo "<script>alert('Username tidak ditemukan!'); window.location='admin_login.php';</script>";
}
?>
