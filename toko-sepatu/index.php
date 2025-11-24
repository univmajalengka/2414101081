<?php include "db.php"; ?>
<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Toko Sepatu</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="style.css">
</head>
<body>

<!-- Navbar -->
<nav class="navbar navbar-expand-lg navbar-dark custom-navbar">
  <div class="container">
    <a class="navbar-brand fw-bold" href="#">F1 Sport</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarMenu">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item"><a class="nav-link" href="#tentang">Tentang</a></li>
        <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>
        <li class="nav-item"><a class="nav-link" href="#galeri">Galeri</a></li>
      </ul>
      <button class="btn btn-cart" data-bs-toggle="modal" data-bs-target="#cartModal">
        Keranjang <span id="cart-count" class="badge bg-danger">0</span>
      </button>
    </div>
  </div>
</nav>

<!-- Jumbotron -->
<div class="jumbotron text-center text-white d-flex align-items-center justify-content-center">
  <div>
    <h1 class="display-5 fw-bold">Selamat Datang di F1 Sport</h1>
    <p class="fs-5">Cari Sepatu Kesukaan Mu</p>
  </div>
</div>

<!-- Kategori -->
<div class="container text-center mb-3">
  <button class="btn btn-outline-primary m-1" onclick="filterCategory('all')">Semua</button>
  <button class="btn btn-outline-primary m-1" onclick="filterCategory('running')">Running</button>
  <button class="btn btn-outline-primary m-1" onclick="filterCategory('futsal')">Futsal</button>
</div>

<!-- List Equipment -->
<div class="container">
  <div class="row" id="equipment-list">
    <?php
      $sql = "SELECT * FROM equipment";
      $result = $conn->query($sql);
      while($row = $result->fetch_assoc()):
    ?>
    <div class="col-md-4 mb-3 equipment-card" data-category="<?= $row['kategori']; ?>">
      <div class="card">
        <img src="img/<?= $row['gambar']; ?>" class="card-img-top" style="height:200px; object-fit:cover;" alt="<?= $row['nama']; ?>">
        <div class="card-body">
          <h5 class="card-title"><?= $row['nama']; ?></h5>
          <p class="card-text">Rp <?= number_format($row['harga']); ?></p>
          <button class="btn btn-success" onclick="addToCart(<?= $row['id']; ?>,'<?= $row['nama']; ?>',<?= $row['harga']; ?>)">Tambah</button>
          <button class="btn btn-primary" onclick="buyNow(<?= $row['id']; ?>,'<?= $row['nama']; ?>',<?= $row['harga']; ?>)">Beli</button>
        </div>
      </div>
    </div>
    <?php endwhile; ?>
  </div>
</div>

<!-- Modal Keranjang -->
<div class="modal fade" id="cartModal" tabindex="-1">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header"><h5 class="modal-title">Keranjang</h5></div>
      <div class="modal-body" id="cart-items"></div>
      <div class="modal-footer">
        <button class="btn btn-success" onclick="checkout()">Checkout</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal Beli -->
<div class="modal fade" id="buyModal" tabindex="-1">
  <div class="modal-dialog">
    <form class="modal-content" method="POST" action="order.php">
      <div class="modal-header"><h5 class="modal-title">Form Pemesanan</h5></div>
      <div class="modal-body">
        <input type="hidden" name="total" id="buy-total">
        <div class="mb-3">
          <label>Nama Pemesan</label>
          <input type="text" class="form-control" name="nama" required>
        </div>
        <div class="mb-3">
          <label>No HP</label>
          <input type="text" class="form-control" name="no_hp" required>
        </div>
        <div class="mb-3">
          <label>Tanggal_pemesanan</label>
          <input type="date" class="form-control" name="tanggal" required>
        </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-primary">Pesan Sekarang</button>
      </div>
    </form>
  </div>
</div>

<!-- Tentang -->
<div id="tentang" class="container my-5">
  <h2 class="text-center">Tentang Toko Sepatu</h2>
  <p class="text-center">Kami menyediakan sepatu dengan harga terjangkau, kualitas terbaik, dan layanan cepat.</p>
</div>

<!-- Kontak -->
<div id="kontak" class="container my-5">
  <h2 class="text-center">Kontak Kami</h2>
  <p class="text-center">
    📞 0838-1284-8312 <br>
    📧 info@tokosepatu@gmail.com <br>
    📍 Majalengka, jawa barat, Indonesia
  </p>
</div>

<!-- Footer -->
<footer class="bg-dark text-white text-center p-3 mt-5">
  <p>&copy; 2025 F1 Sport. All rights reserved.</p>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="cart.js"></script>
</body>
</html>