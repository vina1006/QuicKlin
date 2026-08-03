<?php
// Data sejarah perusahaan statis
$sejarahData = [
    [
        'tahun' => '2015',
        'judul' => 'Pendirian QuicKlin',
        'deskripsi' => 'Pendirian perusahaan dengan fokus pada jasa kebersihan rumah tangga di area Jakarta dan sekitarnya.',
        'icon' => 'fas fa-flag'
    ],
    [
        'tahun' => '2017',
        'judul' => 'Ekspansi Komersial',
        'deskripsi' => 'Perluasan layanan kebersihan komersial untuk kantor, toko, dan fasilitas bisnis.',
        'icon' => 'fas fa-building'
    ],
    [
        'tahun' => '2019',
        'judul' => 'Layanan Spesialis',
        'deskripsi' => 'Peluncuran layanan kebersihan pasca-konstruksi dan pembersihan mendalam.',
        'icon' => 'fas fa-tools'
    ],
    [
        'tahun' => '2021',
        'judul' => 'Teknologi Digital',
        'deskripsi' => 'Implementasi sistem reservasi dan manajemen klien berbasis aplikasi mobile.',
        'icon' => 'fas fa-mobile-alt'
    ],
    [
        'tahun' => '2023',
        'judul' => 'Go Green Initiative',
        'deskripsi' => 'Penggunaan produk pembersih ramah lingkungan dan ekspansi ke layanan disinfeksi.',
        'icon' => 'fas fa-leaf'
    ],
    [
        'tahun' => '2025',
        'judul' => 'Ekspansi Regional',
        'deskripsi' => 'Perluasan jangkauan layanan ke seluruh Indonesia dan sertifikasi ISO 9001:2015.',
        'icon' => 'fas fa-globe'
    ]
];

// Data nilai-nilai perusahaan
$nilaiPerusahaan = [
    [
        'judul' => 'Kualitas Prima',
        'deskripsi' => 'Berkomitmen memberikan hasil kebersihan terbaik yang melampaui harapan pelanggan dengan standar internasional.',
        'icon' => 'fas fa-star',
        'color' => 'var(--magenta)'
    ],
    [
        'judul' => 'Ramah Lingkungan',
        'deskripsi' => 'Menerapkan metode dan menggunakan produk yang aman bagi lingkungan dan kesehatan keluarga.',
        'icon' => 'fas fa-leaf',
        'color' => 'var(--teal)'
    ],
    [
        'judul' => 'Kepercayaan',
        'deskripsi' => 'Membangun hubungan jangka panjang dengan pelanggan berdasarkan integritas dan profesionalisme.',
        'icon' => 'fas fa-handshake',
        'color' => 'var(--blue)'
    ],
    [
        'judul' => 'Inovasi Berkelanjutan',
        'deskripsi' => 'Terus mengembangkan teknologi dan metode pembersihan untuk efisiensi dan efektivitas maksimal.',
        'icon' => 'fas fa-lightbulb',
        'color' => 'var(--yellow)'
    ],
    [
        'judul' => 'Kepuasan Pelanggan',
        'deskripsi' => 'Menjadikan kepuasan pelanggan sebagai prioritas utama dalam setiap layanan yang kami berikan.',
        'icon' => 'fas fa-smile',
        'color' => 'var(--coral)'
    ],
    [
        'judul' => 'Tim Profesional',
        'deskripsi' => 'Mengembangkan tim yang terlatih, jujur, berdedikasi, dan memiliki passion dalam memberikan layanan.',
        'icon' => 'fas fa-users',
        'color' => 'var(--magenta)'
    ]
];

// Data statistik perusahaan
$statistikData = [
    ['label' => 'Tahun Berpengalaman', 'nilai' => '10+', 'icon' => 'fas fa-calendar-alt'],
    ['label' => 'Klien Puas', 'nilai' => '1000+', 'icon' => 'fas fa-users'],
    ['label' => 'Proyek Selesai', 'nilai' => '5000+', 'icon' => 'fas fa-check-circle'],
    ['label' => 'Tim Profesional', 'nilai' => '50+', 'icon' => 'fas fa-user-tie']
];
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Profil Perusahaan - QuicKlin</title>
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
    font-size: 1.8rem;
    position: relative;
    padding-left: 20px;
  }

  .section-title::before {
    content: '';
    position: absolute;
    left: 0;
    top: 50%;
    transform: translateY(-50%);
    width: 4px;
    height: 40px;
    background: linear-gradient(45deg, var(--magenta), var(--coral));
    border-radius: 2px;
  }

  .profile-card {
    background: white;
    border-radius: 20px;
    padding: 40px;
    margin-bottom: 40px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    border: 1px solid rgba(94, 146, 242, 0.1);
    transition: all 0.3s ease;
  }

  .profile-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.12);
  }

  .stats-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 20px;
    margin-bottom: 40px;
  }

  .stat-card {
    background: white;
    border-radius: 15px;
    padding: 30px;
    text-align: center;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    border-top: 4px solid var(--magenta);
    transition: all 0.3s ease;
  }

  .stat-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.12);
  }

  .stat-icon {
    font-size: 2.5rem;
    color: var(--magenta);
    margin-bottom: 15px;
  }

  .stat-number {
    font-size: 2.2rem;
    font-weight: 800;
    color: var(--blue);
    display: block;
    margin-bottom: 5px;
  }

  .stat-label {
    color: #666;
    font-weight: 500;
    font-size: 0.9rem;
  }

  .vision-mission-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
    gap: 30px;
    margin-bottom: 40px;
  }

  .vision-card, .mission-card {
    background: white;
    border-radius: 20px;
    padding: 40px;
    text-align: center;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    position: relative;
    overflow: hidden;
  }

  .vision-card::before, .mission-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: linear-gradient(45deg, var(--magenta), var(--coral));
  }

  .vision-card:hover, .mission-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px rgba(0,0,0,0.12);
  }

  .vision-icon, .mission-icon {
    font-size: 3.5rem;
    background: linear-gradient(45deg, var(--magenta), var(--coral));
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    margin-bottom: 20px;
  }

  .vision-title, .mission-title {
    color: var(--blue);
    font-weight: 700;
    font-size: 1.5rem;
    margin-bottom: 20px;
  }

  .vision-text {
    color: var(--magenta);
    font-weight: 600;
    font-size: 1.1rem;
    font-style: italic;
    line-height: 1.6;
  }

  .mission-text {
    color: #555;
    line-height: 1.8;
  }

  .mission-list {
    list-style: none;
    padding: 0;
    text-align: left;
  }

  .mission-list li {
    padding: 8px 0;
    display: flex;
    align-items: flex-start;
  }

  .mission-list li i {
    color: var(--teal);
    margin-right: 12px;
    margin-top: 4px;
    font-size: 1rem;
  }

  .timeline-section {
    background: white;
    border-radius: 20px;
    padding: 40px;
    margin-bottom: 40px;
    box-shadow: 0 10px 30px rgba(0,0,0,0.08);
  }

  .timeline {
    position: relative;
    padding-left: 40px;
  }

  .timeline::before {
    content: '';
    position: absolute;
    left: 20px;
    top: 0;
    bottom: 0;
    width: 3px;
    background: linear-gradient(180deg, var(--magenta), var(--coral));
    border-radius: 2px;
  }

  .timeline-item {
    position: relative;
    margin-bottom: 40px;
    background: #f8f9fa;
    border-radius: 15px;
    padding: 25px;
    transition: all 0.3s ease;
  }

  .timeline-item:hover {
    background: white;
    box-shadow: 0 5px 20px rgba(0,0,0,0.1);
    transform: translateX(10px);
  }

  .timeline-item::before {
    content: '';
    position: absolute;
    left: -52px;
    top: 25px;
    width: 16px;
    height: 16px;
    border-radius: 50%;
    background: var(--magenta);
    border: 4px solid white;
    box-shadow: 0 0 0 3px var(--magenta);
  }

  .timeline-year {
    display: inline-block;
    background: linear-gradient(45deg, var(--magenta), var(--coral));
    color: white;
    padding: 6px 15px;
    border-radius: 20px;
    font-weight: 700;
    font-size: 0.9rem;
    margin-bottom: 10px;
  }

  .timeline-title {
    color: var(--blue);
    font-weight: 600;
    font-size: 1.2rem;
    margin-bottom: 8px;
  }

  .timeline-description {
    color: #666;
    line-height: 1.6;
    margin: 0;
  }

  .timeline-icon {
    position: absolute;
    right: 20px;
    top: 20px;
    font-size: 1.5rem;
    color: var(--coral);
    opacity: 0.7;
  }

  .values-grid {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
    gap: 25px;
  }

  .value-card {
    background: white;
    border-radius: 15px;
    padding: 30px;
    box-shadow: 0 5px 20px rgba(0,0,0,0.08);
    transition: all 0.3s ease;
    border-left: 4px solid var(--teal);
  }

  .value-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0,0,0,0.12);
  }

  .value-card:nth-child(2n) {
    border-left-color: var(--magenta);
  }

  .value-card:nth-child(3n) {
    border-left-color: var(--coral);
  }

  .value-header {
    display: flex;
    align-items: center;
    margin-bottom: 15px;
  }

  .value-icon {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.3rem;
    margin-right: 15px;
    background: linear-gradient(45deg, var(--magenta), var(--coral));
    color: white;
  }

  .value-title {
    color: var(--blue);
    font-weight: 600;
    font-size: 1.1rem;
    margin: 0;
  }

  .value-description {
    color: #666;
    line-height: 1.6;
    font-size: 0.95rem;
    margin: 0;
  }

  .company-intro {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #555;
    margin-bottom: 30px;
    text-align: justify;
  }

  .company-intro strong {
    color: var(--magenta);
    font-weight: 600;
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
    
    .profile-card {
      padding: 25px;
    }
    
    .timeline {
      padding-left: 30px;
    }
    
    .timeline::before {
      left: 15px;
    }
    
    .timeline-item::before {
      left: -42px;
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
        <h1 class="page-title">Profil Perusahaan</h1>
        <p class="page-subtitle">
          Mengenal lebih dekat QuicKlin, perjalanan kami dalam memberikan solusi kebersihan 
          terbaik dan komitmen untuk terus berinovasi dalam melayani kebutuhan Anda.
        </p>
      </div>

      <!-- Statistik Perusahaan -->
      <div class="stats-grid">
        <?php foreach($statistikData as $stat): ?>
          <div class="stat-card">
            <div class="stat-icon">
              <i class="<?= $stat['icon'] ?>"></i>
            </div>
            <span class="stat-number"><?= $stat['nilai'] ?></span>
            <span class="stat-label"><?= $stat['label'] ?></span>
          </div>
        <?php endforeach; ?>
      </div>

      <!-- Latar Belakang Perusahaan -->
      <div class="profile-card">
        <h2 class="section-title">
          <i class="fas fa-building me-3"></i>Latar Belakang Perusahaan
        </h2>
        
        <div class="company-intro">
          <strong>QuicKlin</strong> didirikan pada tahun 2015 dengan visi untuk menjadi penyedia jasa kebersihan terkemuka di Indonesia. Bermula dari sebuah tim kecil dengan peralatan sederhana, kami telah berkembang menjadi perusahaan kebersihan profesional yang melayani berbagai kebutuhan, mulai dari hunian pribadi hingga gedung komersial dan fasilitas industri.
        </div>

        <div class="company-intro">
          Perjalanan kami dimulai dengan melayani kebutuhan kebersihan rumah tangga di Jakarta, dan seiring dengan perkembangan bisnis serta kepercayaan pelanggan, kami terus memperluas layanan dan jangkauan operasional kami. Didukung oleh tim yang terlatih dan penggunaan teknologi kebersihan modern, QuicKlin kini menjadi pilihan utama untuk solusi kebersihan yang berkualitas dan terpercaya.
        </div>

        <div class="company-intro">
          Dengan komitmen pada kualitas, inovasi, dan kepuasan pelanggan, kami terus beradaptasi dengan kebutuhan pasar yang dinamis sambil mempertahankan nilai-nilai inti perusahaan yang telah menjadi fondasi kesuksesan kami selama ini.
        </div>
      </div>

      <!-- Visi dan Misi -->
      <div class="vision-mission-grid">
        <div class="vision-card">
          <div class="vision-icon">
            <i class="fas fa-eye"></i>
          </div>
          <h3 class="vision-title">Visi Perusahaan</h3>
          <p class="vision-text">
            "Menjadi penyedia jasa kebersihan terdepan yang menciptakan lingkungan bersih, sehat, dan nyaman bagi seluruh pelanggan di Indonesia."
          </p>
        </div>

        <div class="mission-card">
          <div class="mission-icon">
            <i class="fas fa-bullseye"></i>
          </div>
          <h3 class="mission-title">Misi Perusahaan</h3>
          <ul class="mission-list">
            <li><i class="fas fa-check-circle"></i>Menyediakan layanan kebersihan berkualitas tinggi dengan standar profesional internasional</li>
            <li><i class="fas fa-check-circle"></i>Menggunakan peralatan dan produk kebersihan yang efektif, aman, dan ramah lingkungan</li>
            <li><i class="fas fa-check-circle"></i>Mengembangkan tim yang terlatih, jujur, dan berdedikasi tinggi</li>
            <li><i class="fas fa-check-circle"></i>Memberikan solusi kebersihan yang inovatif dan sesuai kebutuhan pelanggan</li>
            <li><i class="fas fa-check-circle"></i>Berkomitmen pada praktik bisnis yang bertanggung jawab dan berkelanjutan</li>
          </ul>
        </div>
      </div>

      <!-- Sejarah Perusahaan -->
      <div class="timeline-section">
        <h2 class="section-title">
          <i class="fas fa-history me-3"></i>Sejarah Perjalanan Kami
        </h2>
        
        <div class="timeline">
          <?php foreach($sejarahData as $sejarah): ?>
            <div class="timeline-item">
              <div class="timeline-year"><?= $sejarah['tahun'] ?></div>
              <h4 class="timeline-title"><?= $sejarah['judul'] ?></h4>
              <p class="timeline-description"><?= $sejarah['deskripsi'] ?></p>
              <div class="timeline-icon">
                <i class="<?= $sejarah['icon'] ?>"></i>
              </div>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Nilai-nilai Perusahaan -->
      <div class="profile-card">
        <h2 class="section-title">
          <i class="fas fa-heart me-3"></i>Nilai-nilai Perusahaan
        </h2>
        
        <div class="values-grid">
          <?php foreach($nilaiPerusahaan as $nilai): ?>
            <div class="value-card">
              <div class="value-header">
                <div class="value-icon">
                  <i class="<?= $nilai['icon'] ?>"></i>
                </div>
                <h4 class="value-title"><?= $nilai['judul'] ?></h4>
              </div>
              <p class="value-description"><?= $nilai['deskripsi'] ?></p>
            </div>
          <?php endforeach; ?>
        </div>
      </div>

      <!-- Call to Action -->
      <div class="profile-card" style="background: linear-gradient(135deg, var(--magenta), var(--coral)); color: white; text-align: center;">
        <h2 style="color: white; margin-bottom: 20px;">
          <i class="fas fa-handshake me-3"></i>Mari Berkolaborasi dengan Kami
        </h2>
        <p style="font-size: 1.1rem; margin-bottom: 30px; opacity: 0.9;">
          Bergabunglah dengan ribuan pelanggan yang telah mempercayakan kebutuhan kebersihan mereka kepada QuicKlin. 
          Bersama-sama, mari kita ciptakan lingkungan yang lebih bersih, sehat, dan nyaman.
        </p>
        <a href="kontak.php" class="btn btn-light btn-lg me-3" style="color: var(--magenta); font-weight: 600;">
          <i class="fas fa-phone me-2"></i>Hubungi Kami
        </a>
        <a href="produk.php" class="btn btn-outline-light btn-lg" style="font-weight: 600;">
          <i class="fas fa-shopping-cart me-2"></i>Lihat Layanan
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
document.addEventListener('DOMContentLoaded', function() {
    // Animasi counter untuk statistik
    const statNumbers = document.querySelectorAll('.stat-number');
    const observerOptions = {
        threshold: 0.5,
        rootMargin: '0px 0px -50px 0px'
    };

    const statsObserver = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                const target = entry.target;
                const finalText = target.textContent;
                const numberMatch = finalText.match(/\d+/);
                
                if (numberMatch) {
                    const finalNumber = parseInt(numberMatch[0]);
                    const suffix = finalText.replace(/\d+/, '');
                    const increment = Math.ceil(finalNumber / 50);
                    let current = 0;
                    
                    const updateNumber = () => {
                        current += increment;
                        if (current < finalNumber) {
                            target.textContent = current + suffix;
                            requestAnimationFrame(updateNumber);
                        } else {
                            target.textContent = finalText;
                        }
                    };
                    
                    updateNumber();
                }
                
                statsObserver.unobserve(target);
            }
        });
    }, observerOptions);

    statNumbers.forEach(stat => {
        statsObserver.observe(stat);
    });

    // Animasi fade in untuk elemen
    const animateElements = document.querySelectorAll('.profile-card, .stat-card, .vision-card, .mission-card, .timeline-item, .value-card');
    
    const fadeObserver = new IntersectionObserver(function(entries) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, { threshold: 0.1 });

    animateElements.forEach((element, index) => {
        element.style.opacity = '0';
        element.style.transform = 'translateY(30px)';
        element.style.transition = `all 0.6s ease ${index * 0.1}s`;
        fadeObserver.observe(element);
    });

    // Hover effect untuk timeline items
    const timelineItems = document.querySelectorAll('.timeline-item');
    timelineItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            this.style.borderLeft = '4px solid var(--magenta)';
        });
        
        item.addEventListener('mouseleave', function() {
            this.style.borderLeft = 'none';
        });
    });
});
</script>

</body>
</html>