<?php
require_once 'koneksi/koneksi.php';
require_once 'models/Artikel.php';

$artikelModel = new Artikel($koneksi);
$daftarArtikel = $artikelModel->getAll();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Beranda - QuicKlin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <style>
    .hero {
      background: linear-gradient(rgba(0,0,0,.5), rgba(0,0,0,.5)), url('img/banner/banner.jpg') center/cover no-repeat;
      color: white;
      padding: 100px 20px;
      text-align: center;
      border-radius: 10px;
    }

    .section-title {
      font-weight: bold;
      color: #444;
      margin-bottom: 20px;
    }

    .service-card {
      border: 1px solid #ddd;
      border-radius: 10px;
      padding: 20px;
      transition: all 0.3s ease-in-out;
    }

    .service-card:hover {
      box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    .artikel-terbaru img {
      max-width: 100%;
      height: auto;
      border-radius: 8px;
    }
  </style>
</head>
<body>

<div class="container-fluid content-wrapper">
  <?php include 'header.php'; ?>
  <?php include 'navbar.php'; ?>
  <div class="row">
    <?php include 'sidebar.php'; ?>

    <div class="col-lg-10 col-md-9 col-12 p-4">

      <!-- Hero Section -->
      <div class="hero mb-5">
        <h1 class="display-5">Selamat Datang di QuicKlin</h1>
        <p class="lead">Solusi Terbaik untuk Transportasi dan Logistik Anda</p>
      </div>

      <!-- Tentang Kami Ringkas -->
      <section class="mb-5">
        <h3 class="section-title">Tentang LogiTrans Nusantara</h3>
        <p>LogiTrans Nusantara adalah perusahaan yang bergerak di bidang transportasi dan logistik, dengan jaringan luas dan layanan yang profesional. Kami berkomitmen memberikan solusi pengiriman yang cepat, aman, dan efisien ke seluruh Indonesia.</p>
      </section>

      <!-- Layanan Kami -->
      <section class="mb-5">
        <h3 class="section-title">Layanan Kami</h3>
        <div class="row">
          <div class="col-md-4">
            <div class="service-card">
              <h5>Transportasi Darat</h5>
              <p>Pengiriman barang melalui jalur darat dengan armada truk modern dan driver berpengalaman.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="service-card">
              <h5>Distribusi Nasional</h5>
              <p>Layanan distribusi barang ke seluruh Indonesia dengan waktu pengiriman yang tepat.</p>
            </div>
          </div>
          <div class="col-md-4">
            <div class="service-card">
              <h5>Manajemen Logistik</h5>
              <p>Solusi terintegrasi untuk manajemen supply chain dan pergudangan yang efisien.</p>
            </div>
          </div>
        </div>
      </section>

      <!-- Artikel Terbaru -->
      <section class="artikel-terbaru">
        <h3 class="section-title">Artikel Terbaru</h3>
        <div class="row">
          <?php if ($daftarArtikel && $daftarArtikel->num_rows > 0): ?>
            <?php $i = 0; while ($row = $daftarArtikel->fetch_assoc()): ?>
              <?php if ($i++ >= 3) break; ?>
              <div class="col-md-4 mb-4">
                <div class="card h-100">
                  <?php if ($row['gambar']): ?>
                    <img src="uploads/<?= htmlspecialchars($row['gambar']) ?>" class="card-img-top" alt="<?= htmlspecialchars($row['judul']) ?>">
                  <?php endif; ?>
                  <div class="card-body">
                    <h5 class="card-title"><?= htmlspecialchars($row['judul']) ?></h5>
                    <p class="card-text"><?= htmlspecialchars(substr($row['isi'], 0, 100)) ?>...</p>
                  </div>
                </div>
              </div>
            <?php endwhile; ?>
          <?php else: ?>
            <p class="text-muted">Belum ada artikel tersedia.</p>
          <?php endif; ?>
        </div>
      </section>
    </div>
  </div>
</div>

<?php include 'footer.php'; ?>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
