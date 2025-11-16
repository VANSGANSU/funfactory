<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: admin_login.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Admin Dashboard</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<h1>Selamat Datang, Admin <?= $_SESSION['admin']; ?> 👋</h1>

<a href="../keranjang.php">Lihat Keranjang Pembeli</a><br><br>
<a href="logout_admin.php">Logout</a>
</body>
</html>
