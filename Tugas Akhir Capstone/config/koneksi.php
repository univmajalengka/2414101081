<?php
$host = "localhost";
$user = "root";
$pass = "";
$db   = "wisata_db"; // Sesuai instruksi Anda

// Membuat koneksi
$conn = mysqli_connect($host, $user, $pass, $db);

// Cek koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}
?>