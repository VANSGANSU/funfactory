<?php
session_start();

// Koneksi
$koneksi = new mysqli("localhost", "root", "", "user_login");
if ($koneksi->connect_error) die("Error: " . $koneksi->connect_error);

// Ambil input
$email = $_POST['email'];
$password = $_POST['password'];

// Cek user
$sql = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
$result = $koneksi->query($sql);

if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();

    if (password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['email']   = $user['email'];

        header("Location: ../web.html");
        exit;
    } else {
        echo "<script>alert('Password salah!');window.location='../login.html';</script>";
    }
} else {
    echo "<script>alert('Email tidak ditemukan!');window.location='../register.html';</script>";
}
