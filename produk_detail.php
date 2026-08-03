<?php
require_once 'koneksi/koneksi.php';
require_once 'models/Produk.php';

$produkModel = new Produk($koneksi);

// Ambil ID dari URL
$id = isset($_GET['id']) ? (int)$_GET['id'] : 0;
$data = $produkModel->getById($id);

// Kalau data tidak ditemukan
if (!$data) {
  echo "<h3 class='text-center mt-5'>Produk tidak ditemukan.</h3>";
  exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title><?= htmlspecialchars($data['nama_produk']) ?> - QuicKlin</title>
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

    .product-container {
      background-color: white;
      border-radius: 15px;
      padding: 30px;
      box-shadow: 0 5px 20px rgba(0,0,0,0.1);
      margin-bottom: 30px;
    }

    .product-title {
      color: var(--blue);
      font-weight: 700;
      font-size: 2.2rem;
      margin-bottom: 20px;
    }

    .product-price {
      font-size: 2rem;
      font-weight: 800;
      color: var(--teal);
      margin-bottom: 25px;
      display: flex;
      align-items: center;
    }

    .product-price i {
      margin-right: 10px;
      color: var(--yellow);
    }

    .price-badge {
      background: linear-gradient(135deg, var(--teal), var(--coral));
      color: white;
      padding: 15px 25px;
      border-radius: 50px;
      font-size: 1.5rem;
      font-weight: 700;
      display: inline-block;
      box-shadow: 0 5px 15px rgba(30, 198, 201, 0.3);
    }

    .product-description {
      color: #444;
      line-height: 1.9;
      font-size: 1.1rem;
      background-color: #f8f9fa;
      padding: 25px;
      border-radius: 15px;
      border-left: 4px solid var(--magenta);
      margin-bottom: 25px;
    }

    .product-description h4 {
      color: var(--blue);
      font-weight: 600;
      margin-bottom: 15px;
    }

    .product-description p {
      margin-bottom: 15px;
    }

    .back-btn {
      background-color: var(--magenta);
      color: white;
      border: none;
      padding: 12px 25px;
      border-radius: 25px;
      font-weight: 500;
      transition: all 0.3s ease;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      font-size: 1rem;
    }

    .back-btn:hover {
      background-color: var(--coral);
      transform: translateY(-2px);
      color: white;
      box-shadow: 0 5px 15px rgba(59, 118, 236, 0.4);
    }

    .back-btn i {
      margin-right: 8px;
    }

    .contact-btn {
      background: linear-gradient(135deg, var(--yellow), #ff9500);
      color: white;
      border: none;
      padding: 15px 30px;
      border-radius: 30px;
      font-weight: 600;
      transition: all 0.3s ease;
      text-decoration: none;
      display: inline-flex;
      align-items: center;
      font-size: 1.1rem;
      margin-left: 15px;
    }

    .contact-btn:hover {
      transform: translateY(-3px);
      box-shadow: 0 8px 25px rgba(246, 178, 25, 0.4);
      color: white;
    }

    .contact-btn i {
      margin-right: 10px;
    }

    .product-features {
      background-color: white;
      border-radius: 15px;
      padding: 25px;
      margin-bottom: 25px;
      border: 2px solid #e9ecef;
    }

    .feature-item {
      display: flex;
      align-items: center;
      margin-bottom: 15px;
      padding: 10px;
      background-color: #f8f9fa;
      border-radius: 10px;
      transition: all 0.3s ease;
    }

    .feature-item:hover {
      background-color: rgba(59, 118, 236, 0.05);
      transform: translateX(5px);
    }

    .feature-item i {
      color: var(--teal);
      font-size: 1.2rem;
      margin-right: 15px;
      width: 25px;
      text-align: center;
    }

    .feature-item span {
      color: #555;
      font-weight: 500;
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

    .product-badge {
      background: linear-gradient(135deg, var(--magenta), var(--coral));
      color: white;
      padding: 8px 20px;
      border-radius: 20px;
      font-size: 0.9rem;
      font-weight: 600;
      display: inline-block;
      margin-bottom: 20px;
    }

    @media (max-width: 768px) {
      .product-title {
        font-size: 1.8rem;
      }
      
      .product-price {
        font-size: 1.5rem;
      }

      .price-badge {
        font-size: 1.2rem;
        padding: 10px 20px;
      }
      
      .product-description {
        font-size: 1rem;
        padding: 20px;
      }

      .contact-btn {
        margin-left: 0;
        margin-top: 10px;
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
        <h1 class="page-title">Detail Produk & Layanan</h1>
        <p class="page-subtitle">
          Pelajari lebih detail tentang produk dan layanan kebersihan profesional yang kami tawarkan dengan kualitas terbaik dan harga kompetitif.
        </p>
      </div>

      <!-- Product Content -->
      <div class="product-container">
        <div class="product-badge">
          <i class="fas fa-star me-2"></i>Layanan Premium
        </div>
        
        <h1 class="product-title"><?= htmlspecialchars($data['nama_produk']) ?></h1>
        
        <div class="product-price mb-4">
          <div class="price-badge">
            <i class="fas fa-tag"></i>
            Rp <?= number_format($data['harga'], 0, ',', '.') ?>
          </div>
        </div>

        <div class="product-description">
          <h4><i class="fas fa-info-circle me-2"></i>Deskripsi Produk</h4>
          <?= nl2br(htmlspecialchars($data['deskripsi'])) ?>
        </div>

        <!-- Product Features -->
        <div class="product-features">
          <h4 class="mb-4" style="color: var(--blue); font-weight: 600;">
            <i class="fas fa-check-circle me-2" style="color: var(--teal);"></i>Keunggulan Layanan
          </h4>
          <div class="feature-item">
            <i class="fas fa-shield-alt"></i>
            <span>Kualitas terjamin dengan standar internasional</span>
          </div>
          <div class="feature-item">
            <i class="fas fa-clock"></i>
            <span>Layanan cepat dan tepat waktu</span>
          </div>
          <div class="feature-item">
            <i class="fas fa-users"></i>
            <span>Tim profesional berpengalaman</span>
          </div>
          <div class="feature-item">
            <i class="fas fa-tools"></i>
            <span>Peralatan modern dan berkualitas tinggi</span>
          </div>
          <div class="feature-item">
            <i class="fas fa-leaf"></i>
            <span>Ramah lingkungan dan aman</span>
          </div>
          <div class="feature-item">
            <i class="fas fa-phone-alt"></i>
            <span>Dukungan pelanggan 24/7</span>
          </div>
        </div>

        <div class="mt-4 d-flex flex-wrap align-items-center">
          <a href="produk.php" class="back-btn">
            <i class="fas fa-arrow-left"></i> Kembali ke Produk
          </a>
          <a href="kontak.php" class="contact-btn">
            <i class="fas fa-whatsapp"></i> Pesan Sekarang
          </a>
        </div>
      </div>

      <!-- Call to Action -->
      <div class="text-center mt-4">
        <div class="page-header">
          <h3 class="page-title">Siap Untuk Memulai?</h3>
          <p class="page-subtitle mb-4">
            Dapatkan layanan kebersihan terbaik untuk rumah atau kantor Anda. Konsultasi gratis dan penawaran khusus menanti Anda!
          </p>
          <div class="d-flex flex-wrap justify-content-center gap-3">
            <a href="kontak.php" class="btn btn-primary btn-lg">
              <i class="fas fa-phone me-2"></i> Hubungi Kami
            </a>
            <a href="produk.php" class="btn btn-outline-primary btn-lg">
              <i class="fas fa-eye me-2"></i> Lihat Produk Lain
            </a>
            <a href="index.php" class="btn btn-outline-secondary btn-lg">
              <i class="fas fa-home me-2"></i> Beranda
            </a>
          </div>
        </div>
      </div>

      <!-- Additional Info -->
      <div class="row mt-4">
        <div class="col-md-4 mb-3">
          <div class="product-features text-center">
            <i class="fas fa-medal" style="font-size: 2.5rem; color: var(--yellow); margin-bottom: 15px;"></i>
            <h5 style="color: var(--blue);">Kualitas Terbaik</h5>
            <p class="text-muted">Standar internasional dengan hasil yang memuaskan</p>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="product-features text-center">
            <i class="fas fa-handshake" style="font-size: 2.5rem; color: var(--teal); margin-bottom: 15px;"></i>
            <h5 style="color: var(--blue);">Pelayanan Prima</h5>
            <p class="text-muted">Komitmen penuh untuk kepuasan pelanggan</p>
          </div>
        </div>
        <div class="col-md-4 mb-3">
          <div class="product-features text-center">
            <i class="fas fa-dollar-sign" style="font-size: 2.5rem; color: var(--magenta); margin-bottom: 15px;"></i>
            <h5 style="color: var(--blue);">Harga Kompetitif</h5>
            <p class="text-muted">Nilai terbaik dengan harga yang terjangkau</p>
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
    // Animate content on load
    const productContainer = document.querySelector('.product-container');
    productContainer.style.opacity = '0';
    productContainer.style.transform = 'translateY(30px)';
    productContainer.style.transition = 'all 0.6s ease';
    
    setTimeout(() => {
        productContainer.style.opacity = '1';
        productContainer.style.transform = 'translateY(0)';
    }, 100);

    // Animate feature items
    const featureItems = document.querySelectorAll('.feature-item');
    featureItems.forEach((item, index) => {
        item.style.opacity = '0';
        item.style.transform = 'translateX(-20px)';
        item.style.transition = 'all 0.5s ease';
        
        setTimeout(() => {
            item.style.opacity = '1';
            item.style.transform = 'translateX(0)';
        }, 200 + (index * 100));
    });

    // Price animation
    const priceBadge = document.querySelector('.price-badge');
    if (priceBadge) {
        priceBadge.style.transform = 'scale(0.8)';
        priceBadge.style.transition = 'all 0.5s ease';
        
        setTimeout(() => {
            priceBadge.style.transform = 'scale(1)';
        }, 300);
    }
});
</script>
</body>
</html>