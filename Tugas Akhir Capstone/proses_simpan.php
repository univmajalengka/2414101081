<?php
// Menggunakan require agar jika koneksi gagal, proses langsung berhenti
require 'config/koneksi.php';

// Ambil data dari POST
$nama    = $_POST['nama'];
$hp      = $_POST['hp'];
$tanggal = $_POST['tanggal'];
$durasi  = $_POST['durasi'];
$peserta = $_POST['peserta'];

// Logika Checkbox untuk database (Y/N)
$akomodasi    = isset($_POST['akomodasi']) ? 'Y' : 'N';
$transportasi = isset($_POST['transportasi']) ? 'Y' : 'N';
$makanan      = isset($_POST['makanan']) ? 'Y' : 'N';

// Menghilangkan format ribuan (titik) agar data menjadi angka murni untuk database
// Contoh: "2.200.000" menjadi "2200000"
$harga = str_replace('.', '', $_POST['harga_paket']);
$total = str_replace('.', '', $_POST['total_tagihan']);

// Query INSERT ke tabel pesanan
$query = "INSERT INTO pesanan (
            nama_pemesan, 
            nomor_hp, 
            tanggal_pesan, 
            waktu_perjalanan, 
            akomodasi, 
            transportasi, 
            makanan, 
            jumlah_peserta, 
            harga_paket, 
            total_tagihan
          ) VALUES (
            '$nama', 
            '$hp', 
            '$tanggal', 
            '$durasi', 
            '$akomodasi', 
            '$transportasi', 
            '$makanan', 
            '$peserta', 
            '$harga', 
            '$total'
          )";

// Eksekusi query
if (mysqli_query($conn, $query)) {
    // Menampilkan notifikasi sukses dan pindah ke halaman daftar pesanan
    echo "<script>
            alert('Data Berhasil Disimpan!'); 
            window.location='modifikasi_pesanan.php';
          </script>";
} else {
    // Menampilkan pesan error jika query gagal
    echo "Gagal menyimpan data: " . mysqli_error($conn);
}

// Tutup koneksi
mysqli_close($conn);
?>