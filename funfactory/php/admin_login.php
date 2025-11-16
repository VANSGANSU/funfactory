<?php
session_start();

if (isset($_SESSION['admin'])) {
    header("Location: admin_dashboard.php");
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
<title>Login Admin</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>
<div class="login-container">
    <h1>Admin Login</h1>

    <form action="admin_login_process.php" method="POST">
        <input type="text" name="username" placeholder="Username Admin" required>
        <input type="password" name="password" placeholder="Password" required>

        <button type="submit">Login</button>
    </form>

    <a href="login.html">← Kembali ke Login User</a>
</div>
</body>
</html>
