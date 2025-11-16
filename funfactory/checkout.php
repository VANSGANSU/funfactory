<?php
session_start();

// Cek apakah keranjang kosong
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: keranjang.php");
    exit;
}

$cart = $_SESSION['cart'];
$total = 0;
foreach ($cart as $item) {
    $total += $item['harga'];
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Checkout</title>
<link rel="stylesheet" href="css/style.css">
</head>
<body>

<h1>Checkout</h1>

<table border="1" cellpadding="10">
<tr><th>Produk</th><th>Harga</th></tr>
<?php foreach ($cart as $item): ?>
<tr>
    <td><?= htmlspecialchars($item['produk']) ?></td>
    <td>Rp<?= number_format($item['harga'], 0, ',', '.') ?></td>
</tr>
<?php endforeach; ?>
<tr>
    <td><strong>Total</strong></td>
    <td><strong>Rp<?= number_format($total,0,',','.') ?></strong></td>
</tr>
</table>

<br><br>

<form action="checkout_proses.php" method="post">
    <label>Nama Lengkap</label><br>
    <input type="text" name="nama" required><br><br>

    <label>Alamat Lengkap</label><br>
    <textarea name="alamat" required></textarea><br><br>

    <label>No. HP / WhatsApp</label><br>
    <input type="text" name="nohp" required><br><br>

    <button type="submit">Konfirmasi Pesanan</button>
</form>

</body>
</html>
