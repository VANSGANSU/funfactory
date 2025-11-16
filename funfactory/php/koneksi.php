<?php
$host = "localhost";    // host server
$user = "root";         // username database (default XAMPP)
$pass = "";             // password database
$db   = "funfactory";   // nama database

$conn = mysqli_connect($host, $user, $pass, $db);

if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>
