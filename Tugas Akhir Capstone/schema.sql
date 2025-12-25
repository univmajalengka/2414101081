CREATE DATABASE IF NOT EXISTS wisata_db;
USE wisata_db;

CREATE TABLE pesanan (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama_pemesan VARCHAR(100) NOT NULL,
    nomor_hp VARCHAR(15) NOT NULL,
    tanggal_pesan DATE NOT NULL,
    waktu_perjalanan INT NOT NULL,
    akomodasi CHAR(1) DEFAULT 'N',
    transportasi CHAR(1) DEFAULT 'N',
    makanan CHAR(1) DEFAULT 'N',
    jumlah_peserta INT NOT NULL,
    harga_paket INT NOT NULL,
    total_tagihan INT NOT NULL
);