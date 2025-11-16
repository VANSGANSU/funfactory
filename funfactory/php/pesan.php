<?php
include "koneksi.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nama    = $_POST['nama'];
    $telepon = $_POST['telepon'];
    $alamat  = $_POST['alamat'];
    $produk  = $_POST['produk'];
    $harga   = $_POST['harga'];

    $sql = "INSERT INTO pesanan (nama, telepon, alamat, produk, harga) 
            VALUES ('$nama', '$telepon', '$alamat', '$produk', '$harga')";

    if (mysqli_query($conn, $sql)) {
        header("Location: sukses.php?nama=$nama&produk=$produk");
        exit;
    } else {
        echo "Gagal menyimpan pesanan: " . mysqli_error($conn);
    }
    mysqli_close($conn);
}
?>
