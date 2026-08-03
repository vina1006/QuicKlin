<?php
require_once 'koneksi/koneksi.php';
require_once 'models/Artikel.php';

$artikelModel = new Artikel($koneksi);

// Ambil ID dari URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$data = $artikelModel->getById($id);

// Kalau data tidak ditemukan
if (!$data) {
  echo "<h3 class='text-center mt-5'>Artikel tidak ditemukan.</h3>";
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($data['judul']) ?> - QuicKlin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --yellow: #f6b219;     /* Kuning-oranye cerah */
      --magenta:rgb(59, 118, 236);    /* Warna biru */
      --coral:rgb(94, 146, 242);      /* Warna biru muda */
      --teal: #1ec6c9;       /* Toska cerah */
      --blue: #2f6ebf;       /* Biru keunguan yang tenang */
    }

    html, body {
      height: 100%;
      margin: 0;
      font-family: 'Poppins', sans-serif;
    }

    body {
      display: flex;
      flex-direction: column;
      background-color: #f8f9fa;
    }

    .content-wrapper {
      flex: 1;
    }

    .logo-img {
      max-width: 60px;
      height: auto;
    }

    .company-name {
      font-size: 1.8rem;
      font-weight: 800;
      background: linear-gradient(45deg, var(--magenta), var(--yellow));
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
      margin: 0;
      letter-spacing: 1px;
    }

    .footer {
      border-top: 1px solid rgba(0,0,0,0.1);
      padding: 20px;
      font-size: 0.9rem;
      text-align: center;
      background-color: white;
    }

    .page-header {
      background: linear-gradient(135deg, rgba(246,178,25,0.1), rgba(59,118,236,0.1));
      border-radius: 15px;
      padding: 30px;
      margin-bottom: 30px;
      border-left: 5px solid var(--magenta);
    }

    .page-title {
      color: var(--magenta);
      font-weight: 700;
      margin-bottom: 15px;
    }

    .page-subtitle {
      color: #555;
      line-height: 1.8;
      margin-bottom: 0;
    }

    .article-container {
      background-color: white;
      border-radius: 15px;
      padding: 30px;
      box-shadow: 0 5px 20px rgba(0,0,0,0.1);
      margin-bottom: 30px;
    }

    .article-title {
      color: var(--blue);
      font-weight: 700;
      font-size: 2rem;
      margin-bottom: 20px;
    }

    .article-meta {
      color: #888;
      font-size: 0.9rem;
      margin-bottom: 25px;
      display: flex;
      align-items: center;
    }

    .article-meta i {
      margin-right: 5px;
      color: var(--teal);
    }

    .article-img {
      border-radius: 15px;
      margin-bottom: 25px;
      width: 100%;
      max-height: 500px;
      object-fit: cover;
      box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }

    .article-content {
      color: #444;
      line-height: 1.9;
      font-size: 1.05rem;
    }

    .article-content p {
      margin-bottom: 20px;
    }

    .back-btn {
      background-color: var(--magenta);
      color: white;
      border: none;
      padding: 10px 20px;
      border-radius: 25px;
      font-weight: 500;
      transition: all 0.3s ease;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
    }

    .back-btn:hover {
      background-color: var(--coral);
      transform: translateY(-2px);
      color: white;
    }

    .back-btn i {
      margin-right: 8px;
    }

    .social-icon {
      color: var(--magenta);
      font-size: 1.2rem;
      margin: 0 10px;
      transition: all 0.3s ease;
    }

    .social-icon:hover {
      color: var(--yellow);
      transform: scale(1.2);
    }

    @media (max-width: 768px) {
      .article-title {
        font-size: 1.6rem;
      }
      
      .article-content {
        font-size: 1rem;
      }
    }
  </style>
</head>
<body>

<div class="container-fluid content-wrapper">
  <!-- Header -->
  <div class="row align-items-center border-bottom py-3 bg-white">
    <div class="col-md-2 col-4 text-center">
      <img src="img/logo/logo1.png" alt="QuicKlin Logo" class="logo-img rounded-circle">
    </div>
    <div class="col-md-10 col-8 text-center text-md-start">
      <div class="company-name">QuicKlin</div>
      <p class="text-muted mb-0" style="font-size: 0.9rem;">Solusi Kebersihan Profesional</p>
    </div>
  </div>

  <?php include 'navbar.php'; ?>

  <div class="row">
    <?php include 'sidebar.php'; ?>

    <!-- Konten Utama -->
    <div class="col-lg-10 col-md-9 col-12 p-4">
      <!-- Page Header -->
      <div class="page-header">
        <h1 class="page-title">Detail Artikel</h1>
        <p class="page-subtitle">
          Temukan informasi dan wawasan terbaru seputar layanan kebersihan dan tips perawatan properti dari tim profesional kami.
        </p>
      </div>

      <!-- Article Content -->
      <div class="article-container">
        <h1 class="article-title"><?= htmlspecialchars($data['judul']) ?></h1>
        
        <div class="article-meta">
          <span class="me-3"><i class="fas fa-calendar-alt"></i> <?= date('d M Y', strtotime($data['tanggal_dibuat'])) ?></span>
          <span><i class="fas fa-user"></i> Admin QuicKlin</span>
        </div>

        <?php if (!empty($data['gambar'])): ?>
          <img src="uploads/<?= $data['gambar'] ?>" alt="Gambar Artikel" class="article-img">
        <?php endif; ?>

        <div class="article-content">
          <?= nl2br(htmlspecialchars($data['isi'])) ?>
        </div>

        <div class="mt-5">
          <a href="index.php" class="back-btn">
            <i class="fas fa-arrow-left"></i> Kembali ke Beranda
          </a>
        </div>
      </div>

      <!-- Call to Action -->
      <div class="text-center mt-3">
        <div class="page-header">
          <h3 class="page-title">Tertarik dengan Layanan Kami?</h3>
          <p class="page-subtitle mb-3">
            Hubungi kami sekarang untuk konsultasi gratis dan dapatkan penawaran terbaik untuk kebutuhan kebersihan Anda.
          </p>
          <a href="kontak.php" class="btn btn-primary btn-lg me-3">
            <i class="fas fa-phone me-2"></i> Hubungi Kami
          </a>
          <a href="produk.php" class="btn btn-outline-primary btn-lg">
            <i class="fas fa-shopping-cart me-2"></i> Lihat Layanan
          </a>
        </div>
      </div>
    </div>
  </div>
</div>

<footer class="footer">
  <div class="container">
    <div class="mb-3">
      <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
      <a href="#" class="social-icon"><i class="fab fa-tiktok"></i></a>
      <a href="#" class="social-icon"><i class="fab fa-facebook"></i></a>
      <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
      <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
    </div>
    <p class="mb-1">© <?= date('Y') ?> QuicKlin. All rights reserved.</p>
    <p class="mb-0 text-muted" style="font-size: 0.8rem;">Creating magical moments since 2015</p>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Animate content on load
    const articleContent = document.querySelector('.article-container');
    articleContent.style.opacity = '0';
    articleContent.style.transform = 'translateY(30px)';
    articleContent.style.transition = 'all 0.6s ease';
    
    setTimeout(() => {
        articleContent.style.opacity = '1';
        articleContent.style.transform = 'translateY(0)';
    }, 100);
});
</script>
</body>
</html>