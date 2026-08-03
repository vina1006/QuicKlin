<?php
// Data layanan statis
$layananData = [
    'residential' => [
        [
            'id' => 1,
            'nama' => 'Paket Kilau Harian',
            'harga' => 'Rp 150.000',
            'durasi' => '2-3 jam',
            'fitur' => [
                'Pembersihan debu di seluruh permukaan',
                'Menyapu dan mengepel lantai',
                'Pembersihan dapur (meja, wastafel, kompor)',
                'Pembersihan kamar mandi standar',
                'Pengosongan tempat sampah',
                'Area coverage: 50-80m²'
            ],
            'ideal' => 'Pemeliharaan rutin, hunian dengan aktivitas sedang',
            'icon' => 'fas fa-home',
            'popular' => false
        ],
        [
            'id' => 2,
            'nama' => 'Paket Bersih Mendalam',
            'harga' => 'Rp 300.000',
            'durasi' => '4-6 jam',
            'fitur' => [
                'Semua fitur Paket Kilau Harian',
                'Deep cleaning kamar mandi (kerak, nat)',
                'Pembersihan menyeluruh dapur',
                'Vakum karpet dan sofa',
                'Pembersihan jendela bagian dalam',
                'Pembersihan sarang laba-laba',
                'Disinfeksi area sentuh tinggi'
            ],
            'ideal' => 'Pembersihan berkala, setelah acara, pra/pasca pindahan',
            'icon' => 'fas fa-sparkles',
            'popular' => true
        ]
    ],
    'commercial' => [
        [
            'id' => 3,
            'nama' => 'Paket Optimal Kantor',
            'harga' => 'Rp 500.000',
            'durasi' => '3-4 jam',
            'fitur' => [
                'Pembersihan area kerja dan ruang umum',
                'Pembersihan dan disinfeksi toilet',
                'Pembersihan dapur/pantry kantor',
                'Pengosongan tempat sampah',
                'Vakum atau pel lantai',
                'Area coverage: 100-200m²'
            ],
            'ideal' => 'Kantor kecil hingga menengah, toko ritel',
            'icon' => 'fas fa-building',
            'popular' => false
        ],
        [
            'id' => 4,
            'nama' => 'Paket Prima Bisnis',
            'harga' => 'Rp 850.000',
            'durasi' => '5-7 jam',
            'fitur' => [
                'Semua fitur Paket Optimal Kantor',
                'Pembersihan jendela internal dan eksternal',
                'Perawatan lantai khusus (poles, wax)',
                'Deep cleaning karpet',
                'Disinfeksi menyeluruh',
                'Area coverage: 200-500m²'
            ],
            'ideal' => 'Gedung perkantoran, restoran, fasilitas dengan trafik tinggi',
            'icon' => 'fas fa-crown',
            'popular' => true
        ]
    ]
];

$layananTambahan = [
    [
        'nama' => 'Pembersihan Pasca-Konstruksi',
        'harga' => 'Mulai Rp 400.000',
        'deskripsi' => 'Menghilangkan debu dan kotoran sisa proyek pembangunan',
        'icon' => 'fas fa-hard-hat'
    ],
    [
        'nama' => 'Pembersihan Karpet & Sofa',
        'harga' => 'Mulai Rp 200.000',
        'deskripsi' => 'Metode khusus untuk mengangkat noda dan kotoran mendalam',
        'icon' => 'fas fa-couch'
    ],
    [
        'nama' => 'Pembersihan Jendela Eksterior',
        'harga' => 'Mulai Rp 150.000',
        'deskripsi' => 'Untuk bangunan bertingkat dengan peralatan safety',
        'icon' => 'fas fa-window-restore'
    ],
    [
        'nama' => 'Poles Lantai Premium',
        'harga' => 'Mulai Rp 250.000',
        'deskripsi' => 'Mengembalikan kilau lantai marmer, teraso, atau keramik',
        'icon' => 'fas fa-gem'
    ],
    [
        'nama' => 'Disinfeksi Anti-Bakteri',
        'harga' => 'Mulai Rp 180.000',
        'deskripsi' => 'Sterilisasi menyeluruh dengan disinfektan bersertifikat',
        'icon' => 'fas fa-shield-virus'
    ],
    [
        'nama' => 'Cuci Tekanan Tinggi',
        'harga' => 'Mulai Rp 300.000',
        'deskripsi' => 'Pembersihan eksterior untuk teras, dinding, dan area luar',
        'icon' => 'fas fa-spray-can'
    ]
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Produk & Layanan - QuicKlin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<style>
  :root {
    --yellow: #f6b219;     /* Kuning-oranye cerah */
    --magenta:rgb(59, 118, 236);    /* Pink magenta vibrant */
    --coral:rgb(94, 146, 242);      /* Pink lembut menuju coral */
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
    background: linear-gradient(135deg, rgba(246,178,25,0.1), rgba(236,59,137,0.1));
    border-radius: 15px;
    padding: 40px;
    margin-bottom: 40px;
    border-left: 5px solid var(--magenta);
    text-align: center;
  }

  .page-title {
    color: var(--magenta);
    font-weight: 700;
    margin-bottom: 15px;
    font-size: 2.5rem;
  }

  .page-subtitle {
    color: #555;
    line-height: 1.8;
    font-size: 1.1rem;
    margin-bottom: 0;
  }

  .section-title {
    color: var(--blue);
    font-weight: 700;
    margin-bottom: 30px;
    text-align: center;
    font-size: 2rem;
    position: relative;
  }

  .section-title::after {
    content: '';
    display: block;
    width: 80px;
    height: 4px;
    background: linear-gradient(45deg, var(--magenta), var(--coral));
    margin: 15px auto;
    border-radius: 2px;
  }

  .section-subtitle {
    text-align: center;
    color: #666;
    font-size: 1.1rem;
    margin-bottom: 40px;
    line-height: 1.6;
  }

  .package-card {
    background: white;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
    transition: all 0.4s ease;
    margin-bottom: 30px;
    border: 2px solid transparent;
    position: relative;
  }

  .package-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 40px rgba(0,0,0,0.15);
    border-color: var(--coral);
  }

  .package-card.popular {
    border-color: var(--magenta);
    transform: scale(1.02);
  }

  .package-card.popular::before {
    content: 'PALING POPULER';
    position: absolute;
    top: 20px;
    right: -35px;
    background: linear-gradient(45deg, var(--magenta), var(--coral));
    color: white;
    padding: 8px 50px;
    font-size: 0.8rem;
    font-weight: 600;
    transform: rotate(45deg);
    z-index: 2;
    letter-spacing: 1px;
  }

  .package-header {
    background: linear-gradient(135deg, var(--magenta), var(--coral));
    color: white;
    padding: 30px;
    text-align: center;
    position: relative;
  }

  .package-icon {
    font-size: 3rem;
    margin-bottom: 15px;
    opacity: 0.9;
  }

  .package-name {
    font-size: 1.5rem;
    font-weight: 700;
    margin-bottom: 10px;
  }

  .package-price {
    font-size: 2rem;
    font-weight: 800;
    margin-bottom: 5px;
  }

  .package-duration {
    font-size: 0.9rem;
    opacity: 0.9;
  }

  .package-body {
    padding: 30px;
  }

  .feature-list {
    list-style: none;
    padding: 0;
    margin-bottom: 25px;
  }

  .feature-list li {
    padding: 8px 0;
    color: #555;
    display: flex;
    align-items: center;
  }

  .feature-list li i {
    color: var(--teal);
    margin-right: 12px;
    font-size: 1.1rem;
  }

  .ideal-for {
    background: linear-gradient(135deg, rgba(30,198,201,0.1), rgba(246,178,25,0.1));
    border-radius: 10px;
    padding: 15px;
    margin-bottom: 25px;
    border-left: 4px solid var(--teal);
  }

  .ideal-for-label {
    font-weight: 600;
    color: var(--blue);
    font-size: 0.9rem;
    margin-bottom: 5px;
  }

  .ideal-for-text {
    color: #666;
    font-size: 0.9rem;
    margin: 0;
  }

  .btn-order {
    background: linear-gradient(45deg, var(--magenta), var(--coral));
    color: white;
    border: none;
    padding: 12px 30px;
    border-radius: 25px;
    font-weight: 600;
    transition: all 0.3s ease;
    width: 100%;
    font-size: 1rem;
  }

  .btn-order:hover {
    background: linear-gradient(45deg, var(--coral), var(--magenta));
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(59, 118, 236, 0.3);
  }

  .addon-card {
    background: white;
    border-radius: 15px;
    padding: 25px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    margin-bottom: 20px;
    border-left: 4px solid var(--teal);
  }

  .addon-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.12);
    border-left-color: var(--magenta);
  }

  .addon-icon {
    color: var(--magenta);
    font-size: 2.5rem;
    margin-bottom: 15px;
  }

  .addon-name {
    color: var(--blue);
    font-weight: 600;
    font-size: 1.2rem;
    margin-bottom: 8px;
  }

  .addon-price {
    color: var(--magenta);
    font-weight: 700;
    font-size: 1.1rem;
    margin-bottom: 10px;
  }

  .addon-description {
    color: #666;
    font-size: 0.9rem;
    line-height: 1.5;
  }

  .why-choose-section {
    background: white;
    border-radius: 20px;
    padding: 50px;
    margin: 50px 0;
    box-shadow: 0 10px 30px rgba(0,0,0,0.05);
  }

  .benefit-item {
    text-align: center;
    margin-bottom: 40px;
  }

  .benefit-icon {
    background: linear-gradient(135deg, var(--magenta), var(--coral));
    color: white;
    border-radius: 50%;
    width: 80px;
    height: 80px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    font-size: 2rem;
    margin-bottom: 20px;
    box-shadow: 0 8px 25px rgba(59, 118, 236, 0.3);
  }

  .benefit-title {
    color: var(--blue);
    font-weight: 600;
    font-size: 1.2rem;
    margin-bottom: 10px;
  }

  .benefit-text {
    color: #666;
    line-height: 1.6;
    font-size: 0.95rem;
  }

  .cta-section {
    background: linear-gradient(135deg, var(--magenta), var(--coral));
    color: white;
    border-radius: 20px;
    padding: 50px;
    text-align: center;
    margin: 40px 0;
  }

  .cta-title {
    font-size: 2rem;
    font-weight: 700;
    margin-bottom: 15px;
  }

  .cta-subtitle {
    font-size: 1.1rem;
    margin-bottom: 30px;
    opacity: 0.9;
  }

  .btn-cta {
    background: white;
    color: var(--magenta);
    border: none;
    padding: 15px 40px;
    border-radius: 30px;
    font-weight: 700;
    font-size: 1.1rem;
    transition: all 0.3s ease;
    margin: 0 10px;
  }

  .btn-cta:hover {
    background: var(--yellow);
    color: white;
    transform: translateY(-3px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.2);
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
    .page-title {
      font-size: 2rem;
    }
    
    .section-title {
      font-size: 1.5rem;
    }
    
    .package-card.popular {
      transform: none;
    }
    
    .why-choose-section {
      padding: 30px 20px;
    }
    
    .cta-section {
      padding: 30px 20px;
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
        <h1 class="page-title">Produk & Layanan Kami</h1>
        <p class="page-subtitle">
          Di QuicKlin, kami memahami bahwa setiap ruang memiliki kebutuhan kebersihan yang unik. 
          Oleh karena itu, kami menawarkan berbagai paket jasa cleaning yang dirancang khusus untuk 
          memberikan kebersihan maksimal, kenyamanan, dan ketenangan pikiran.
        </p>
      </div>

      <!-- Paket Rumah Tangga -->
      <div class="mb-5">
        <h2 class="section-title">
          <i class="fas fa-home me-3"></i>Paket Rumah Tangga
        </h2>
        <p class="section-subtitle">
          Dirancang untuk menjaga kebersihan dan kenyamanan hunian Anda sehari-hari dengan layanan profesional yang terpercaya.
        </p>
        
        <div class="row">
          <?php foreach($layananData['residential'] as $layanan): ?>
            <div class="col-lg-6 col-md-12 mb-4">
              <div class="package-card <?= $layanan['popular'] ? 'popular' : '' ?>">
                <div class="package-header">
                  <div class="package-icon">
                    <i class="<?= $layanan['icon'] ?>"></i>
                  </div>
                  <h4 class="package-name"><?= $layanan['nama'] ?></h4>
                  <div class="package-price"><?= $layanan['harga'] ?></div>
                  <div class="package-duration">Durasi: <?= $layanan['durasi'] ?></div>
                </div>
                <div class="package-body">
                  <ul class="feature-list">
                    <?php foreach($layanan['fitur'] as $fitur): ?>
                      <li><i class="fas fa-check-circle"></i> <?= $fitur ?></li>
                    <?php endforeach; ?>
                  </ul>
                  <div class="ideal-for">
                    <div class="ideal-for-label">Ideal untuk:</div>
                    <p class="ideal-for-text"><?= $layanan['ideal'] ?></p>
                  </div>
                  <button class="btn btn-order" onclick="orderService('<?= $layanan['nama'] ?>')">
                    <i class="fas fa-shopping-cart me-2"></i>Pesan Sekarang
                  </button>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Paket Komersial -->
      <div class="mb-5">
        <h2 class="section-title">
          <i class="fas fa-building me-3"></i>Paket Komersial
        </h2>
        <p class="section-subtitle">
          Solusi kebersihan profesional untuk kantor, toko, dan fasilitas bisnis Anda, 
          menciptakan lingkungan kerja yang produktif dan representatif.
        </p>
        
        <div class="row">
          <?php foreach($layananData['commercial'] as $layanan): ?>
            <div class="col-lg-6 col-md-12 mb-4">
              <div class="package-card <?= $layanan['popular'] ? 'popular' : '' ?>">
                <div class="package-header">
                  <div class="package-icon">
                    <i class="<?= $layanan['icon'] ?>"></i>
                  </div>
                  <h4 class="package-name"><?= $layanan['nama'] ?></h4>
                  <div class="package-price"><?= $layanan['harga'] ?></div>
                  <div class="package-duration">Durasi: <?= $layanan['durasi'] ?></div>
                </div>
                <div class="package-body">
                  <ul class="feature-list">
                    <?php foreach($layanan['fitur'] as $fitur): ?>
                      <li><i class="fas fa-check-circle"></i> <?= $fitur ?></li>
                    <?php endforeach; ?>
                  </ul>
                  <div class="ideal-for">
                    <div class="ideal-for-label">Ideal untuk:</div>
                    <p class="ideal-for-text"><?= $layanan['ideal'] ?></p>
                  </div>
                  <button class="btn btn-order" onclick="orderService('<?= $layanan['nama'] ?>')">
                    <i class="fas fa-shopping-cart me-2"></i>Pesan Sekarang
                  </button>
                </div>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Layanan Tambahan -->
      <div class="mb-5">
        <h2 class="section-title">
          <i class="fas fa-plus-circle me-3"></i>Layanan Tambahan
        </h2>
        <p class="section-subtitle">
          Tersedia untuk melengkapi paket utama atau sebagai layanan mandiri, 
          sesuai kebutuhan spesifik Anda dengan standar kualitas tertinggi.
        </p>
        
        <div class="row">
          <?php foreach($layananTambahan as $addon): ?>
            <div class="col-lg-4 col-md-6 mb-4">
              <div class="addon-card">
                <div class="addon-icon">
                  <i class="<?= $addon['icon'] ?>"></i>
                </div>
                <h5 class="addon-name"><?= $addon['nama'] ?></h5>
                <div class="addon-price"><?= $addon['harga'] ?></div>
                <p class="addon-description"><?= $addon['deskripsi'] ?></p>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Mengapa Memilih QuicKlin -->
      <div class="why-choose-section">
        <h2 class="section-title">
          <i class="fas fa-handshake me-3"></i>Mengapa Memilih QuicKlin?
        </h2>
        
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="benefit-item">
              <div class="benefit-icon">
                <i class="fas fa-user-tie"></i>
              </div>
              <h5 class="benefit-title">Profesional & Terlatih</h5>
              <p class="benefit-text">Tim kami terdiri dari tenaga ahli berpengalaman yang telah melalui pelatihan ketat dan sertifikasi profesional.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="benefit-item">
              <div class="benefit-icon">
                <i class="fas fa-tools"></i>
              </div>
              <h5 class="benefit-title">Peralatan Modern</h5>
              <p class="benefit-text">Menggunakan teknologi dan peralatan kebersihan terkini untuk hasil optimal dan efisiensi maksimal.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="benefit-item">
              <div class="benefit-icon">
                <i class="fas fa-leaf"></i>
              </div>
              <h5 class="benefit-title">Ramah Lingkungan</h5>
              <p class="benefit-text">Produk pembersih berkualitas tinggi yang aman untuk keluarga, hewan peliharaan, dan lingkungan.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="benefit-item">
              <div class="benefit-icon">
                <i class="fas fa-calendar-alt"></i>
              </div>
              <h5 class="benefit-title">Fleksibel & Terpercaya</h5>
              <p class="benefit-text">Jadwal yang fleksibel dan layanan yang dapat diandalkan sesuai kebutuhan dan preferensi Anda.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="benefit-item">
              <div class="benefit-icon">
                <i class="fas fa-star"></i>
              </div>
              <h5 class="benefit-title">Jaminan Kepuasan</h5>
              <p class="benefit-text">Komitmen untuk memberikan layanan terbaik dengan jaminan kepuasan 100% atau uang kembali.</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6">
            <div class="benefit-item">
              <div class="benefit-icon">
                <i class="fas fa-shield-alt"></i>
              </div>
              <h5 class="benefit-title">Asuransi & Bonded</h5>
              <p class="benefit-text">Tim yang diasuransikan dan berlisensi untuk keamanan dan perlindungan properti Anda.</p>
            </div>
          </div>
        </div>
      </div>

      <!-- Call to Action -->
      <div class="cta-section">
        <h2 class="cta-title">Siap Membuat Ruangan Anda Lebih Bersih?</h2>
        <p class="cta-subtitle">
          Hubungi kami sekarang untuk konsultasi gratis dan dapatkan penawaran terbaik 
          untuk kebutuhan kebersihan Anda. Tim profesional kami siap membantu!
        </p>
        <a href="kontak.php" class="btn btn-cta">
          <i class="fas fa-phone me-2"></i>Hubungi Kami
        </a>
        <a href="galeri.php" class="btn btn-cta">
          <i class="fas fa-images me-2"></i>Lihat Galeri
        </a>
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
// Function untuk handle order service
function orderService(serviceName) {
    // Redirect ke halaman kontak dengan parameter layanan
    const encodedService = encodeURIComponent(serviceName);
    window.location.href = `kontak.php?service=${encodedService}`;
}

// Animasi saat scroll
document.addEventListener('DOMContentLoaded', function() {
    const observerOptions = {
        threshold: 0.1,