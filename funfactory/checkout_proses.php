<?php
session_start();
include "koneksi.php"; // pastikan file koneksi ada

if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
    header("Location: keranjang.php");
    exit;
}

$cart = $_SESSION['cart'];

$nama = $_POST['nama'];
$alamat = $_POST['alamat'];
$nohp = $_POST['nohp'];

// total harga
$total = 0;
foreach ($cart as $item) {
    $total += $item['harga'];
}

// Simpan ke tabel orders
mysqli_query($conn, "INSERT INTO orders (user_email, total) VALUES ('$nama', '$total')");
$order_id = mysqli_insert_id($conn);

// Simpan detail item
foreach ($cart as $item) {
    $produk = $item['produk'];
    $harga = $item['harga'];

    mysqli_query($conn, "INSERT INTO order_items (order_id, produk, harga) VALUES ('$order_id', '$produk', '$harga')");
}

// Kosongkan keranjang
unset($_SESSION['cart']);

echo "
<script>
alert('Pesanan berhasil dibuat! Kami akan menghubungi anda segera.');
window.location.href = 'web.html';
</script>
";
