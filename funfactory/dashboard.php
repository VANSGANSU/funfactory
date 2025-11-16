<?php
session_start();

// Cek apakah sudah login
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit;
}

// Koneksi database
$koneksi = new mysqli("localhost", "root", "", "user_login");

// Ambil daftar pesanan
$sql = "SELECT * FROM orders ORDER BY tanggal DESC";
$result = $koneksi->query($sql);
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<h1>📦 Daftar Pesanan</h1>

<a href="logout.php" style="float:right;color:red;">Logout</a>
<br><br>

<table border="1" cellpadding="10">
<tr>
    <th>ID Order</th>
    <th>Email User</th>
    <th>Total Harga</th>
    <th>Tanggal</th>
    <th>Aksi</th>
</tr>

<?php while($row = $result->fetch_assoc()): ?>
<tr>
    <td><?= $row['id'] ?></td>
    <td><?= $row['user_email'] ?></td>
    <td>Rp<?= number_format($row['total'],0,',','.') ?></td>
    <td><?= $row['tanggal'] ?></td>
    <td><a href="order_detail.php?id=<?= $row['id'] ?>">Lihat Detail</a></td>
</tr>
<?php endwhile; ?>

</table>

</body>
</html>
