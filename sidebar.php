<?php
// Pastikan koneksi dan model artikel dimuat dulu
require_once 'koneksi/koneksi.php';
require_once 'models/Artikel.php';

$artikelModel = new Artikel($koneksi);
$daftarArtikel = $artikelModel->getAll();
?>


<style>
  .sidebar .nav-link {
    position: relative;
    transition: all 0.3s ease;
    padding-left: 0.75rem;
    color: #343a40;
    border-radius: 0.375rem;
  }

  .sidebar .nav-link:hover {
    background-color: #f0f0f0;
    color: #0d6efd !important;
    padding-left: 1.25rem;
    border-left: 3px solid #0d6efd;
  }

  .sidebar .nav-link i {
    margin-right: 6px;
  }

  .sidebar .list-group-item {
    transition: all 0.3s ease;
    cursor: pointer;
  }

  .sidebar .list-group-item:hover {
    background-color: #f8f9fa;
    color: #0d6efd;
    padding-left: 10px;
  }
</style>

<!-- Bootstrap Icons (pastikan ini ada di head) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<div class="col-lg-2 col-md-3 col-12 sidebar bg-white p-3 border-end">
  <!-- Dropdown Artikel -->
  <div class="mb-4">
    <button class="btn btn-outline-primary w-100" type="button" data-bs-toggle="collapse" data-bs-target="#artikelCollapse" aria-expanded="false">
      <i class="bi bi-journal-text"></i> Artikel
    </button>
    <div class="collapse mt-2" id="artikelCollapse">
      <ul class="list-group list-group-flush">
        <?php if ($daftarArtikel && $daftarArtikel->num_rows > 0): ?>
          <?php while ($row = $daftarArtikel->fetch_assoc()): ?>
            <li class="list-group-item">
  <a href="artikel_detail.php?id=<?= $row['id'] ?>" class="text-decoration-none text-dark">
    <?= htmlspecialchars($row['judul']) ?>
  </a>
</li>

          <?php endwhile; ?>
        <?php else: ?>
          <li class="list-group-item text-muted">Belum ada artikel.</li>
        <?php endif; ?>
      </ul>
    </div>
  </div>

  <!-- Menu Sidebar -->
  <div class="nav flex-column mb-4">
    <a href="galeri.php" class="nav-link"><i class="bi bi-images"></i> Galeri Kegiatan</a>
  </div>

  <!-- Bawah -->
  <div class="nav flex-column border-top pt-3">
    <a href="masuk.php" class="nav-link text-primary"><i class="bi bi-box-arrow-in-right"></i> Masuk</a>
    <a href="daftar.php" class="nav-link text-success"><i class="bi bi-person-plus"></i> Daftar</a>
  </div>
</div>
