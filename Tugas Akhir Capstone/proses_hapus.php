<?php
require 'config/koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    
    // Menghapus data berdasarkan ID
    $query = mysqli_query($conn, "DELETE FROM pesanan WHERE id='$id'");
    
    if ($query) {
        // Jika berhasil, kembali ke daftar dengan notifikasi browser
        echo "<script>alert('Data Berhasil Dihapus!'); window.location='modifikasi_pesanan.php';</script>";
    } else {
        echo "Gagal menghapus data: " . mysqli_error($conn);
    }
} else {
    header("Location: modifikasi_pesanan.php");
}
?>