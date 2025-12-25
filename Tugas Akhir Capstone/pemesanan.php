<?php include 'config/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pemesanan - Waduk Dharma</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <nav>
        <a href="index.php">Beranda</a>
        <a href="index.php#daftar-paket">Daftar Paket Wisata</a>
        <a href="modifikasi_pesanan.php">Modifikasi Pesanan</a>
    </nav>

    <div class="container">
        <div class="form-box">
            <h2 class="section-title">Form Pemesanan Paket Wisata</h2>

            <form action="proses_simpan.php" method="POST" id="formPemesanan">
                <div class="form-group">
                    <label>Nama Pemesan:</label>
                    <input type="text" name="nama" id="nama" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Nomor HP/Telp:</label>
                    <input type="number" name="hp" id="hp" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Tanggal Pesan:</label>
                    <input type="date" name="tanggal" id="tanggal" class="form-control" required>
                </div>

                <div class="form-group">
                    <label>Waktu Perjalanan (Hari):</label>
                    <input type="number" name="durasi" id="durasi" class="form-control" min="1" required
                        oninput="hitungTotal()">
                </div>

                <div class="form-group">
                    <label>Pelayanan Paket Perjalanan:</label>
                    <div class="checkbox-group">
                        <label><input type="checkbox" class="layanan" id="akomodasi" name="akomodasi" value="1000000"
                                onchange="hitungTotal()"> BANANA BOAT (Rp 1.000.000)</label><br>
                        <label><input type="checkbox" class="layanan" id="transportasi" name="transportasi"
                                value="1200000" onchange="hitungTotal()"> ROLLING BOAT (Rp 1.200.000)</label><br>
                        <label><input type="checkbox" class="layanan" id="makanan" name="makanan" value="500000"
                                onchange="hitungTotal()"> PERAHU KELILING (Rp 500.000)</label>
                    </div>
                </div>

                <div class="form-group">
                    <label>Jumlah Peserta:</label>
                    <input type="number" name="peserta" id="peserta" class="form-control" min="1" required
                        oninput="hitungTotal()">
                </div>

                <div class="form-group">
                    <label>Harga Paket  (Rp):</label>
                    <input type="text" name="harga_paket" id="harga_paket" class="form-control readonly-input" readonly>
                </div>

                <div class="form-group">
                    <label>Total Tagihan (Rp):</label>
                    <input type="text" name="total_tagihan" id="total_tagihan" class="form-control readonly-input"
                        readonly>
                </div>

                <div class="form-buttons">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-info" onclick="hitungTotal()">Hitung</button>
                    <button type="reset" class="btn btn-danger">Reset</button>
                </div>
            </form>
        </div>
    </div>

    <footer>
        <p>&copy; Waduk Dharma Kuningan</p>
    </footer>

    <script src="assets/js/script.js"></script>
</body>

</html>