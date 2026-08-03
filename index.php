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
  <title>QuicKlin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">
</head>
<style>
  :root {
    --yellow: #f6b219;
    --magenta: rgb(59, 118, 236);
    --coral: rgb(94, 146, 242);
    --teal: #1ec6c9;
    --blue: #2f6ebf;
    --gradient-bg: linear-gradient(135deg, rgba(246, 178, 25, 0.15), rgba(59, 118, 236, 0.15));
  }

  html, body {
    height: 100%;
    margin: 0;
    font-family: 'Poppins', sans-serif;
    overflow-x: hidden;
  }

  body {
    display: flex;
    flex-direction: column;
    background: var(--gradient-bg);
    background-attachment: fixed;
  }

  .content-wrapper {
    flex: 1;
    position: relative;
    z-index: 1;
  }

  .logo-img {
    max-width: 70px;
    height: auto;
    transition: transform 0.3s ease;
  }

  .logo-img:hover {
    transform: rotate(10deg) scale(1.1);
  }

  .company-name {
    font-size: 2rem;
    font-weight: 700;
    background: linear-gradient(45deg, var(--magenta), var(--yellow));
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    margin: 0;
    letter-spacing: 1.5px;
    text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.1);
  }

  .footer {
    border-top: 1px solid rgba(0, 0, 0, 0.1);
    padding: 20px;
    font-size: 0.9rem;
    text-align: center;
    background: linear-gradient(to right, rgba(255, 255, 255, 0.9), rgba(255, 255, 255, 0.7));
    box-shadow: 0 -5px 15px rgba(0, 0, 0, 0.05);
  }

  .welcome-section {
    background: var(--gradient-bg);
    border-radius: 20px;
    padding: 40px;
    margin-bottom: 30px;
    border-left: 6px solid var(--magenta);
    animation: fadeInUp 1s ease-out;
    position: relative;
    overflow: hidden;
  }

  .welcome-section::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(246, 178, 25, 0.2) 0%, transparent 70%);
    animation: rotate 15s linear infinite;
    z-index: 0;
  }

  .welcome-section > * {
    position: relative;
    z-index: 1;
  }

  .welcome-title {
    color: var(--magenta);
    font-weight: 700;
    margin-bottom: 15px;
    text-transform: uppercase;
    letter-spacing: 1px;
  }

  .welcome-text {
    color: #444;
    line-height: 1.8;
    font-weight: 400;
  }

  .highlight-box {
    background: white;
    border-radius: 15px;
    padding: 25px;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    margin-bottom: 25px;
    border-top: 4px solid var(--teal);
    transition: all 0.4s ease;
    overflow: hidden;
  }

  .highlight-box:hover {
    transform: translateY(-10px);
    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.15);
  }

  .highlight-box::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(30, 198, 201, 0.1) 0%, transparent 70%);
    animation: rotate 20s linear infinite reverse;
    z-index: 0;
  }

  .highlight-box > * {
    position: relative;
    z-index: 1;
  }

  .highlight-title {
    color: var(--blue);
    font-size: 1.3rem;
    margin-bottom: 12px;
    font-weight: 600;
  }

  .article-card {
    border: none;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08);
    transition: all 0.4s ease;
    margin-bottom: 25px;
  }

  .article-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 12px 35px rgba(0, 0, 0, 0.15);
  }

  .article-img {
    height: 200px;
    object-fit: cover;
    transition: transform 0.3s ease;
  }

  .article-card:hover .article-img {
    transform: scale(1.1);
  }

  .article-title {
    color: var(--blue);
    font-weight: 600;
    font-size: 1.2rem;
    margin-bottom: 8px;
  }

  .article-date {
    color: var(--teal);
    font-size: 0.9rem;
  }

  .btn-rund {
    background: linear-gradient(45deg, var(--magenta), var(--yellow));
    color: white;
    border: none;
    padding: 10px 25px;
    border-radius: 25px;
    font-weight: 500;
    transition: all 0.4s ease;
    text-shadow: 1px 1px 3px rgba(0, 0, 0, 0.2);
  }

  .btn-rund:hover {
    background: linear-gradient(45deg, var(--coral), var(--blue));
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(59, 118, 236, 0.3);
  }

  .social-icon {
    color: var(--magenta);
    font-size: 1.3rem;
    margin: 0 12px;
    transition: all 0.3s ease;
  }

  .social-icon:hover {
    color: var(--yellow);
    transform: scale(1.3);
  }

  @keyframes fadeInUp {
    from { opacity: 0; transform: translateY(20px); }
    to { opacity: 1; transform: translateY(0); }
  }

  @keyframes rotate {
    from { transform: rotate(0deg); }
    to { transform: rotate(360deg); }
  }
</style>

<body>

<div class="container-fluid content-wrapper">
  <!-- Header -->
  <div class="row align-items-center border-bottom py-3 bg-white position-sticky top-0 z-3">
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
      <div class="welcome-section">
        <h2 class="welcome-title">Selamat Datang di QuicKlin!</h2>
        <p class="welcome-text">
          Sebagai penyedia jasa kebersihan profesional, kami menghadirkan solusi kebersihan terbaik untuk rumah dan kantor Anda. 
          Dengan tim yang terlatih dan peralatan modern, kami siap memberikan pelayanan terbaik untuk menciptakan lingkungan 
          yang bersih, sehat, dan nyaman bagi Anda.
        </p>
        <a href="produk.php" class="btn btn-rund mt-3">Pesan Layanan Sekarang <i class="fas fa-arrow-right ms-2"></i></a>
      </div>

      <div class="row">
        <div class="col-md-4">
          <div class="highlight-box">
            <h4 class="highlight-title"><i class="fas fa-lightbulb me-2" style="color: var(--yellow);"></i> Tips Kebersihan Terbaru</h4>
            <p>Dapatkan tips dan trik praktis untuk menjaga rumah dan kantor Anda tetap bersih dan sehat dari tim ahli QuicKlin.</p>
            <a href="artikel_detail.php" class="btn btn-rund btn-sm">Baca Artikel</a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="highlight-box">
            <h4 class="highlight-title"><i class="fas fa-tags me-2" style="color: var(--teal);"></i> Promo Spesial Bulan Ini</h4>
            <p>Jangan lewatkan penawaran menarik untuk paket kebersihan mendalam atau layanan disinfeksi kami. Hemat lebih banyak sekarang!</p>
            <a href="produk.php" class="btn btn-rund btn-sm">Lihat Promo</a>
          </div>
        </div>
        <div class="col-md-4">
          <div class="highlight-box">
            <h4 class="highlight-title"><i class="fas fa-quote-right me-2" style="color: var(--coral);"></i> Apa Kata Pelanggan Kami</h4>
            <p>Simak testimoni dari pelanggan setia kami yang telah merasakan kualitas dan profesionalisme layanan QuicKlin.</p>
            <a href="galeri.php" class="btn btn-rund btn-sm">Lihat Testimoni</a>
          </div>
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
    const boxes = document.querySelectorAll('.highlight-box, .welcome-section');
    boxes.forEach((box, index) => {
      box.style.opacity = '0';
      box.style.transform = 'translateY(20px)';
      box.style.transition = 'all 0.6s ease ' + (index * 0.2) + 's';
      setTimeout(() => {
        box.style.opacity = '1';
        box.style.transform = 'translateY(0)';
      }, 100);
    });

    const cards = document.querySelectorAll('.article-card');
    cards.forEach(card => {
      card.addEventListener('mouseenter', () => {
        card.style.transform = 'translateY(-10px)';
      });
      card.addEventListener('mouseleave', () => {
        card.style.transform = 'translateY(0)';
      });
    });
  });
</script>
</body>
</html>