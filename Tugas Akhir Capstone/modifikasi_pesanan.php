<?php include 'config/koneksi.php'; ?>
<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Pesanan - Waduk Dharma</title>
    <link rel="stylesheet" href="assets/css/style.css">
</head>

<body>
    <nav>
        <a href="index.php">Beranda</a>
        <a href="pemesanan.php">Daftar Paket Wisata</a>
        <a href="modifikasi_pesanan.php">Modifikasi Pesanan</a>
    </nav>

    <div class="container">
        <h2 class="section-title">Daftar Pesanan Paket Wisata</h2>

        <div class="table-responsive">
            <table class="styled-table">
                <thead>
                    <tr>
                        <th>Nama</th>
                        <th>Phone</th>
                        <th>Peserta</th>
                        <th>Durasi</th>
                        <th>Akomodasi</th>
                        <th>Transport</th>
                        <th>Makan</th>
                        <th>Total Tagihan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    // Mengambil semua data pesanan dari database wisata_db
                    $data = mysqli_query($conn, "SELECT * FROM pesanan ORDER BY id DESC");
                    while($d = mysqli_fetch_array($data)){
                    ?>
                    <tr>
                        <td><strong><?php echo htmlspecialchars($d['nama_pemesan']); ?></strong></td>
                        <td><?php echo htmlspecialchars($d['nomor_hp']); ?></td>
                        <td><?php echo $d['jumlah_peserta']; ?> Orang</td>
                        <td><?php echo $d['waktu_perjalanan']; ?> Hari</td>

                        <td class="text-center">
                            <?php echo ($d['akomodasi'] == 'Y') ? '<span class="badge badge-yes">Ya</span>' : '<span class="badge badge-no">Tidak</span>'; ?>
                        </td>
                        <td class="text-center">
                            <?php echo ($d['transportasi'] == 'Y') ? '<span class="badge badge-yes">Ya</span>' : '<span class="badge badge-no">Tidak</span>'; ?>
                        </td>
                        <td class="text-center">
                            <?php echo ($d['makanan'] == 'Y') ? '<span class="badge badge-yes">Ya</span>' : '<span class="badge badge-no">Tidak</span>'; ?>
                        </td>

                        <td class="price-cell">Rp <?php echo number_format($d['total_tagihan'], 0, ',', '.'); ?></td>
                        <td>
                            <div class="action-buttons">
                                <a href="edit_pesanan.php?id=<?php echo $d['id']; ?>" class="btn btn-edit">Edit</a>
                                <button onclick="konfirmasiHapus(<?php echo $d['id']; ?>)"
                                    class="btn btn-delete">Delete</button>
                            </div>
                        </td>
                    </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <footer>
        <p>&copy; Waduk Dharma Kuningan</p>
    </footer>

    <script src="assets/js/script.js"></script>
</body>

</html>