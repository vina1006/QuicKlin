<?php
// Data galeri statis dengan path gambar yang benar
$galeriData = [
    [
        'id' => 1,
        'judul' => 'Pembersihan Kantor Premium',
        'deskripsi' => 'Tim profesional kami sedang melakukan pembersihan menyeluruh di gedung perkantoran.',
        'gambar' => 'img/galeri/prepaid.png',
        'kategori' => 'Kantor',
        'tanggal' => '2024-07-15'
    ],
    [
        'id' => 2,
        'judul' => 'Deep Cleaning Rumah Tinggal',
        'deskripsi' => 'Layanan deep cleaning untuk rumah tinggal dengan hasil yang maksimal.',
        'gambar' => 'img/galeri/prepaid.png',
        'kategori' => 'Rumah',
        'tanggal' => '2024-07-10'
    ],
    [
        'id' => 3,
        'judul' => 'Disinfeksi Ruang Meeting',
        'deskripsi' => 'Proses disinfeksi ruang meeting menggunakan peralatan modern dan aman.',
        'gambar' => 'img/galeri/prepaid.png',
        'kategori' => 'Disinfeksi',
        'tanggal' => '2024-07-08'
    ],
    [
        'id' => 4,
        'judul' => 'Pembersihan Karpet Profesional',
        'deskripsi' => 'Tim ahli kami menggunakan teknologi terdepan untuk membersihkan karpet.',
        'gambar' => 'img/galeri/prepaid.png',
        'kategori' => 'Spesialis',
        'tanggal' => '2024-07-05'
    ],
    [
        'id' => 5,
        'judul' => 'Cleaning Service Apartemen',
        'deskripsi' => 'Layanan pembersihan apartemen dengan standar hotel bintang lima.',
        'gambar' => 'img/galeri/prepaid.png',
        'kategori' => 'Apartemen',
        'tanggal' => '2024-07-02'
    ],
    [
        'id' => 6,
        'judul' => 'Pembersihan Jendela Gedung Tinggi',
        'deskripsi' => 'Tim khusus untuk pembersihan jendela gedung bertingkat dengan peralatan safety lengkap.',
        'gambar' => 'img/galeri/prepaid.png',
        'kategori' => 'Spesialis',
        'tanggal' => '2024-06-28'
    ],
    [
        'id' => 7,
        'judul' => 'Sanitasi Dapur Komersial',
        'deskripsi' => 'Pembersihan dan sanitasi dapur komersial dengan standar food safety.',
        'gambar' => 'img/galeri/prepaid.png',
        'kategori' => 'Komersial',
        'tanggal' => '2024-06-25'
    ],
    [
        'id' => 8,
        'judul' => 'Post Construction Cleaning',
        'deskripsi' => 'Layanan pembersihan pasca konstruksi untuk persiapan okupansi.',
        'gambar' => 'img/galeri/prepaid.png',
        'kategori' => 'Konstruksi',
        'tanggal' => '2024-06-20'
    ],
    [
        'id' => 9,
        'judul' => 'Pembersihan Toilet Umum',
        'deskripsi' => 'Maintenance rutin toilet umum dengan produk pembersih berkualitas tinggi.',
        'gambar' => 'img/galeri/prepaid.png',
        'kategori' => 'Fasilitas Umum',
        'tanggal' => '2024-06-18'
    ]
];

// Kategori untuk filter
$kategoriList = ['Semua', 'Kantor', 'Rumah', 'Apartemen', 'Spesialis', 'Komersial', 'Disinfeksi', 'Konstruksi', 'Fasilitas Umum'];
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Galeri Kegiatan - QuicKlin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/css/lightbox.min.css">
</head>
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
    text-align: center;
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

  .filter-buttons {
    margin-bottom: 30px;
    text-align: center;
  }

  .filter-btn {
    background-color: white;
    color: var(--blue);
    border: 2px solid var(--coral);
    padding: 8px 20px;
    border-radius: 25px;
    margin: 5px;
    font-weight: 500;
    transition: all 0.3s ease;
  }

  .filter-btn:hover,
  .filter-btn.active {
    background-color: var(--magenta);
    color: white;
    border-color: var(--magenta);
    transform: translateY(-2px);
  }

  .gallery-item {
    margin-bottom: 30px;
    opacity: 1;
    transition: all 0.5s ease;
  }

  .gallery-item.hidden {
    opacity: 0;
    transform: scale(0.8);
    height: 0;
    margin: 0;
    overflow: hidden;
  }

  .gallery-card {
    border: none;
    border-radius: 15px;
    overflow: hidden;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    transition: all 0.3s ease;
    background: white;
    height: 100%;
  }

  .gallery-card:hover {
    transform: translateY(-8px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.15);
  }

  .gallery-img {
    height: 250px;
    object-fit: cover;
    width: 100%;
    transition: transform 0.3s ease;
  }

  .gallery-card:hover .gallery-img {
    transform: scale(1.05);
  }

  .gallery-content {
    padding: 20px;
  }

  .gallery-title {
    color: var(--blue);
    font-weight: 600;
    font-size: 1.1rem;
    margin-bottom: 10px;
  }

  .gallery-description {
    color: #666;
    font-size: 0.9rem;
    line-height: 1.6;
    margin-bottom: 15px;
  }

  .gallery-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    border-top: 1px solid #eee;
    padding-top: 15px;
  }

  .gallery-category {
    display: inline-block;
    background-color: var(--coral);
    color: white;
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 500;
  }

  .gallery-date {
    color: var(--teal);
    font-size: 0.8rem;
    font-weight: 500;
  }

  .view-btn {
    background-color: var(--magenta);
    color: white;
    border: none;
    padding: 8px 16px;
    border-radius: 20px;
    font-size: 0.8rem;
    font-weight: 500;
    transition: all 0.3s ease;
    text-decoration: none;
    display: inline-block;
  }

  .view-btn:hover {
    background-color: var(--coral);
    color: white;
    transform: translateY(-2px);
  }

  .stats-section {
    background: white;
    border-radius: 15px;
    padding: 30px;
    margin-bottom: 30px;
    box-shadow: 0 5px 15px rgba(0,0,0,0.05);
  }

  .stat-item {
    text-align: center;
  }

  .stat-number {
    font-size: 2.5rem;
    font-weight: 700;
    color: var(--magenta);
    display: block;
  }

  .stat-label {
    color: #666;
    font-size: 0.9rem;
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

  @media (max-width: 768px) {
    .gallery-img {
      height: 200px;
    }
    
    .filter-btn {
      font-size: 0.8rem;
      padding: 6px 15px;
    }
  }
</style>

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
        <h1 class="page-title">Galeri Kegiatan QuicKlin</h1>
        <p class="page-subtitle">
          Dokumentasi kegiatan dan hasil kerja tim profesional kami dalam memberikan layanan kebersihan terbaik. 
          Setiap proyek dikerjakan dengan dedikasi tinggi dan standar kualitas yang konsisten.
        </p>
      </div>

      <!-- Statistik -->
      <div class="stats-section">
        <div class="row">
          <div class="col-md-3 col-6">
            <div class="stat-item">
              <span class="stat-number">500+</span>
              <span class="stat-label">Proyek Selesai</span>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="stat-item">
              <span class="stat-number">150+</span>
              <span class="stat-label">Klien Puas</span>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="stat-item">
              <span class="stat-number">25+</span>
              <span class="stat-label">Tim Profesional</span>
            </div>
          </div>
          <div class="col-md-3 col-6">
            <div class="stat-item">
              <span class="stat-number">5</span>
              <span class="stat-label">Tahun Pengalaman</span>
            </div>
          </div>
        </div>
      </div>

      <!-- Filter Buttons -->
      <div class="filter-buttons">
        <?php foreach($kategoriList as $kategori): ?>
          <button class="btn filter-btn <?= $kategori === 'Semua' ? 'active' : '' ?>" 
                  data-filter="<?= $kategori ?>">
            <?= $kategori ?>
          </button>
        <?php endforeach; ?>
      </div>

      <!-- Gallery Grid -->
      <div class="row" id="galleryContainer">
        <?php foreach($galeriData as $item): ?>
          <div class="col-lg-4 col-md-6 col-12 gallery-item" data-category="<?= $item['kategori'] ?>">
            <div class="gallery-card">
              <img src="<?= $item['gambar'] ?>" 
                   alt="<?= $item['judul'] ?>" 
                   class="gallery-img"
                   onerror="this.src='img/default.jpg'">
              <div class="gallery-content">
                <h5 class="gallery-title"><?= $item['judul'] ?></h5>
                <p class="gallery-description"><?= $item['deskripsi'] ?></p>
                <div class="gallery-meta">
                  <div>
                    <span class="gallery-category"><?= $item['kategori'] ?></span>
                  </div>
                  <div>
                    <span class="gallery-date">
                      <i class="fas fa-calendar-alt me-1"></i>
                      <?= date('d M Y', strtotime($item['tanggal'])) ?>
                    </span>
                  </div>
                </div>
                <div class="text-center mt-3">
                  <a href="<?= $item['gambar'] ?>" 
                     data-lightbox="gallery" 
                     data-title="<?= $item['judul'] ?> - <?= $item['deskripsi'] ?>"
                     class="view-btn">
                    <i class="fas fa-eye me-1"></i> Lihat Detail
                  </a>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Call to Action -->
      <div class="text-center mt-5">
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
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.4/js/lightbox.min.js"></script>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Filter functionality
    const filterButtons = document.querySelectorAll('.filter-btn');
    const galleryItems = document.querySelectorAll('.gallery-item');

    filterButtons.forEach(button => {
        button.addEventListener('click', function() {
            const filter = this.getAttribute('data-filter');
            
            // Update active button
            filterButtons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');
            
            // Filter items
            galleryItems.forEach(item => {
                const category = item.getAttribute('data-category');
                
                if (filter === 'Semua' || category === filter) {
                    item.classList.remove('hidden');
                } else {
                    item.classList.add('hidden');
                }
            });
        });
    });

    // Animate gallery items on load
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };

    const observer = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);

    // Initially set items for animation
    galleryItems.forEach((item, index) => {
        item.style.opacity = '0';
        item.style.transform = 'translateY(30px)';
        item.style.transition = `all 0.6s ease ${index * 0.1}s`;
        observer.observe(item);
    });

    // Animate stats on scroll
    const statNumbers = document.querySelectorAll('.stat-number');
    const statsObserver = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = parseInt(entry.target.textContent);
                const increment = target / 50;
                let current = 0;
                
                const updateNumber = () => {
                    current += increment;
                    if (current < target) {
                        entry.target.textContent = Math.floor(current) + '+';
                        requestAnimationFrame(updateNumber);
                    } else {
                        entry.target.textContent = target + '+';
                    }
                };
                
                updateNumber();
                statsObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    statNumbers.forEach(stat => {
        statsObserver.observe(stat);
    });

    // Lightbox configuration
    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true,
        'fadeDuration': 300,
        'imageFadeDuration': 300
    });
});
</script>

</body>
</html>