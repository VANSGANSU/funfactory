<?php
$nama = $_GET['nama'] ?? '';
$produk = $_GET['produk'] ?? '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<title>Pesanan Berhasil</title>
<link rel="stylesheet" href="../css/gaya.css" />
</head>
<body>
    <div class="container">
        <h2>🎉 Terima Kasih, <?= htmlspecialchars($nama) ?>!</h2>
        <p>Pesanan produk <strong><?= htmlspecialchars($produk) ?></strong> kamu sudah kami terima.</p>
        <p>Kami akan segera menghubungimu untuk konfirmasi pemesanan.</p>
        <a href="../web.html">Kembali ke Beranda</a>
    </div>
</body>
</html>
