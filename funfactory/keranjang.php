<?php
session_start();

// Jika tombol "Tambah ke Keranjang" ditekan
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $produk = $_POST['produk'];
    $harga = $_POST['harga'];

    // Simpan ke session
    $_SESSION['cart'][] = [
        'produk' => $produk,
        'harga' => $harga
    ];
}

// Ambil keranjang
$cart = $_SESSION['cart'] ?? [];
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Keranjang Belanja</title>

<!-- ✅ Ganti CSS ke gaya.css -->
<link rel="stylesheet" href="funfactory/css/gaya.css">

</head>
<body>

<h1>Keranjang Belanja</h1>

<?php if (empty($cart)): ?>
    <p>Keranjang masih kosong.</p>
    <a href="web.html">Kembali Pilih Produk</a>

<?php else: ?>
<table border="1" cellpadding="10">
<tr>
    <th>Produk</th>
    <th>Harga</th>
</tr>
<?php 
$total = 0;
foreach ($cart as $item): 
    $total += $item['harga'];
?>
<tr>
    <td><?= htmlspecialchars($item['produk']) ?></td>
    <td>Rp<?= number_format($item['harga'],0,',','.') ?></td>
</tr>
<?php endforeach; ?>
<tr>
    <td><strong>Total</strong></td>
    <td><strong>Rp<?= number_format($total,0,',','.') ?></strong></td>
</tr>
</table>

<br>
<a href="checkout.php" class="btn">Checkout</a>
<br><br>
<a href="web.html">Tambah Produk Lagi</a>

<?php endif; ?>

</body>
</html>
