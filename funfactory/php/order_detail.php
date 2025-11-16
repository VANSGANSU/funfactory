<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: login.html");
    exit;
}

$koneksi = new mysqli("localhost","root","","user_login");

$order_id = $_GET['id'];

$order = $koneksi->query("SELECT * FROM orders WHERE id='$order_id'")->fetch_assoc();
$items = $koneksi->query("SELECT * FROM order_items WHERE order_id='$order_id'");
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Detail Pesanan</title>
<link rel="stylesheet" href="../css/style.css">
</head>
<body>

<h1>Detail Pesanan #<?= $order_id ?></h1>

<p><strong>Email:</strong> <?= $order['user_email'] ?></p>
<p><strong>Total:</strong> Rp<?= number_format($order['total'],0,',','.') ?></p>
<p><strong>Tanggal:</strong> <?= $order['tanggal'] ?></p>

<h2>Daftar Produk</h2>

<table border="1" cellpadding="10">
<tr>
    <th>Produk</th>
    <th>Harga</th>
</tr>

<?php while($item = $items->fetch_assoc()): ?>
<tr>
    <td><?= $item['produk'] ?></td>
    <td>Rp<?= number_format($item['harga'],0,',','.') ?></td>
</tr>
<?php endwhile; ?>
</table>

<br>
<a href="../dashboard.php">⬅ Kembali ke Dashboard</a>

</body>
</html>
