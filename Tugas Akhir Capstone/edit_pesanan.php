<?php 
include 'config/koneksi.php'; 

// Ambil ID dari URL
$id = $_GET['id'];
$query = mysqli_query($conn, "SELECT * FROM pesanan WHERE id = '$id'");
$d = mysqli_fetch_array($query);
?>

<!DOCTYPE html>
<html lang="id">

<head>
    <title>Edit Pesanan - Desa Wisata Pulesari</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <nav>
        <a href="index.php">Beranda</a>
        <a href="pemesanan.php">Daftar Paket Wisata</a>
        <a href="modifikasi_pesanan.php">Modifikasi Pesanan</a>
    </nav>

    <div class="container">
        <div class="form-box">
            <h2 class="section-title">Edit Pesanan Paket Wisata</h2>
            <form action="proses_update.php" method="POST">
                <input type="hidden" name="id" value="<?php echo $d['id']; ?>">

                <div class="form-group">
                    <label>Nama Pemesan:</label>
                    <input type="text" name="nama" class="form-control" value="<?php echo $d['nama_pemesan']; ?>"
                        required>
                </div>

                <div class="form-group">
                    <label>Nomor HP/Telp:</label>
                    <input type="text" name="hp" class="form-control" value="<?php echo $d['nomor_hp']; ?>" required>
                </div>

                <div class="form-group">
                    <label>Waktu Perjalanan (Hari):</label>
                    <input type="number" name="durasi" id="durasi" class="form-control"
                        value="<?php echo $d['waktu_perjalanan']; ?>" required oninput="hitungTotal()">
                </div>

                <div class="form-group">
                    <label>Pelayanan Paket:</label>
                    <div class="checkbox-group">
                        <label><input type="checkbox" id="akomodasi" name="akomodasi" value="Y"
                                <?php echo ($d['akomodasi']=='Y')?'checked':''; ?> onchange="hitungTotal()"> Penginapan
                            (Rp 1.000.000)</label><br>
                        <label><input type="checkbox" id="transportasi" name="transportasi" value="Y"
                                <?php echo ($d['transportasi']=='Y')?'checked':''; ?> onchange="hitungTotal()">
                            Transportasi (Rp 1.200.000)</label><br>
                        <label><input type="checkbox" id="makanan" name="makanan" value="Y"
                                <?php echo ($d['makanan']=='Y')?'checked':''; ?> onchange="hitungTotal()"> Servis/Makan
                            (Rp 500.000)</label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Jumlah Peserta:</label>
                    <input type="number" name="peserta" id="peserta" class="form-control"
                        value="<?php echo $d['jumlah_peserta']; ?>" required oninput="hitungTotal()">
                </div>

                <div class="form-group">
                    <label>Harga Paket (Rp):</label>
                    <input type="text" name="harga_paket" id="harga_paket" class="form-control readonly-input"
                        value="<?php echo $d['harga_paket']; ?>" readonly>
                </div>

                <div class="form-group">
                    <label>Total Tagihan (Rp):</label>
                    <input type="text" name="total_tagihan" id="total_tagihan" class="form-control readonly-input"
                        value="<?php echo $d['total_tagihan']; ?>" readonly>
                </div>

                <div class="form-buttons">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    <a href="modifikasi_pesanan.php" class="btn btn-danger">Batal</a>
                </div>
            </form>
        </div>
    </div>
    <script src="assets/js/script.js"></script>
</body>

</html>