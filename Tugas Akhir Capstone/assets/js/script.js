function hitungTotal() {
    // 1. Ambil nilai input
    const durasi = parseInt(document.getElementById('durasi').value) || 0;
    const peserta = parseInt(document.getElementById('peserta').value) || 0;
    
    // 2. Hitung Harga Paket berdasarkan layanan yang diceklis
    let hargaPaket = 0;
    if (document.getElementById('akomodasi').checked) hargaPaket += 1000000; // Rp 1.000.000 [cite: 113]
    if (document.getElementById('transportasi').checked) hargaPaket += 1200000; // Rp 1.200.000 [cite: 114]
    if (document.getElementById('makanan').checked) hargaPaket += 500000; // Rp 500.000 [cite: 116]

    // 3. Hitung Total Tagihan: Waktu x Peserta x Harga Paket 
    const totalTagihan = durasi * peserta * hargaPaket;

    // 4. Tampilkan hasil ke input (format ribuan agar rapi)
    document.getElementById('harga_paket').value = hargaPaket.toLocaleString('id-ID');
    document.getElementById('total_tagihan').value = totalTagihan.toLocaleString('id-ID');
}

// Validasi tambahan sebelum form dikirim
document.getElementById('formPemesanan').addEventListener('submit', function(e) {
    const hp = document.getElementById('hp').value;
    const durasi = document.getElementById('durasi').value;
    const peserta = document.getElementById('peserta').value;
    const checkboxes = document.querySelectorAll('.layanan:checked');

    // Pastikan setidaknya satu layanan dipilih
    if (checkboxes.length === 0) {
        alert("Pilih minimal satu pelayanan paket!");
        e.preventDefault();
        return;
    }

    // Pastikan nomor HP tidak mengandung huruf (ekstra validasi)
    if (isNaN(hp)) {
        alert("Nomor HP harus berupa angka!");
        e.preventDefault();
    }
});

function konfirmasiHapus(id) {
    if (confirm("Apakah Anda yakin ingin menghapus data pesanan ini?")) {
        // Mengarahkan ke file proses_hapus.php dengan membawa ID
        window.location.href = "proses_hapus.php?id=" + id;
    }
}