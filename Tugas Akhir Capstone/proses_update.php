<?php
require 'config/koneksi.php';

$id = $_POST['id'];
$nama = $_POST['nama'];
$hp = $_POST['hp'];
$durasi = $_POST['durasi'];
$peserta = $_POST['peserta'];
$harga = preg_replace('/[^0-9]/', '', $_POST['harga_paket']);
$total = preg_replace('/[^0-9]/', '', $_POST['total_tagihan']);

$akomodasi = isset($_POST['akomodasi']) ? 'Y' : 'N';
$transportasi = isset($_POST['transportasi']) ? 'Y' : 'N';
$makanan = isset($_POST['makanan']) ? 'Y' : 'N';

$query = "UPDATE pesanan SET 
          nama_pemesan='$nama', 
          nomor_hp='$hp', 
          waktu_perjalanan='$durasi', 
          akomodasi='$akomodasi', 
          transportasi='$transportasi', 
          makanan='$makanan', 
          jumlah_peserta='$peserta', 
          harga_paket='$harga', 
          total_tagihan='$total' 
          WHERE id='$id'";

if (mysqli_query($conn, $query)) {
    header("Location: modifikasi_pesanan.php?pesan=update_berhasil");
} else {
    echo "Gagal mengupdate data: " . mysqli_error($conn);
}
?>