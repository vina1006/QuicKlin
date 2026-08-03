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
  <title>Kontak - QuicKlin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    :root {
      --primary: #2c3e50;
      --secondary: #3498db;
      --accent: #f39c12;
      --light: #f8f9fa;
      --dark: #343a40;
    }

    html, body {
      height: 100%;
      margin: 0;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    body {
      display: flex;
      flex-direction: column;
      background-color: var(--light);
    }

    .content-wrapper {
      flex: 1;
    }

    .logo-img {
      max-width: 60px;
      height: auto;
    }

    .company-name {
      font-size: 1.7rem;
      font-weight: bold;
      color: var(--primary);
    }

    .footer {
      background-color: var(--primary);
      color: white;
      padding: 20px 0;
      font-size: 0.9rem;
    }

    .contact-section {
      padding: 40px 0;
    }

    .section-title {
      font-weight: 600;
      color: var(--primary);
      margin-bottom: 30px;
      position: relative;
      padding-bottom: 10px;
    }

    .section-title::after {
      content: '';
      position: absolute;
      left: 0;
      bottom: 0;
      width: 60px;
      height: 3px;
      background-color: var(--secondary);
    }

    .contact-card {
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.05);
      padding: 30px;
      margin-bottom: 30px;
      transition: transform 0.3s ease, box-shadow 0.3s ease;
      border-top: 3px solid var(--secondary);
    }

    .contact-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(0,0,0,0.1);
    }

    .contact-icon {
      font-size: 2rem;
      color: var(--secondary);
      margin-bottom: 15px;
    }

    .contact-label {
      font-weight: 600;
      color: var(--primary);
      margin-bottom: 5px;
    }

    .contact-text {
      color: #555;
      line-height: 1.6;
    }

    .contact-form {
      background-color: white;
      border-radius: 10px;
      box-shadow: 0 5px 15px rgba(0,0,0,0.05);
      padding: 30px;
    }

    .form-control:focus {
      border-color: var(--secondary);
      box-shadow: 0 0 0 0.25rem rgba(52, 152, 219, 0.25);
    }

    .btn-primary {
      background-color: var(--secondary);
      border: none;
      padding: 10px 25px;
      font-weight: 500;
    }

    .btn-primary:hover {
      background-color: #2980b9;
    }

    .map-container {
      border-radius: 10px;
      overflow: hidden;
      box-shadow: 0 5px 15px rgba(0,0,0,0.05);
      height: 100%;
    }

    .map-container iframe {
      width: 100%;
      height: 100%;
      border: none;
    }

    .social-media {
      display: flex;
      gap: 15px;
      margin-top: 20px;
    }

    .social-icon {
      width: 40px;
      height: 40px;
      border-radius: 50%;
      background-color: var(--secondary);
      color: white;
      display: flex;
      align-items: center;
      justify-content: center;
      transition: all 0.3s ease;
    }

    .social-icon:hover {
      background-color: var(--primary);
      transform: translateY(-3px);
    }
  </style>
</head>
<body>

<div class="container-fluid content-wrapper">
  <!-- Header -->
  <div class="row align-items-center border-bottom py-3 bg-white">
    <div class="col-md-2 col-4 text-center">
      <img src="img/logo/logo1.png" alt="Logo" class="logo-img">
    </div>
    <div class="col-md-10 col-8 text-center text-md-start">
      <div class="company-name">QuicKlin</div>
    </div>
  </div>

  <?php include 'navbar.php'; ?>

  <div class="row">
    <?php include 'sidebar.php'; ?>

    <!-- Konten Utama -->
    <div class="col-lg-10 col-md-9 col-12 p-4">
      <div class="contact-section">
        <h2 class="section-title">Hubungi Kami</h2>
        
        <div class="row">
          <!-- Informasi Kontak -->
          <div class="col-md-6">
            <div class="contact-card">
              <div class="contact-icon">
                <i class="fas fa-map-marker-alt"></i>
              </div>
              <h4 class="contact-label">Alamat Kantor</h4>
              <p class="contact-text">
                Gedung QuicKlin, Lantai 8<br>
                Jl. QuicKlin Raya No.123<br>
                Jakarta 12560, Indonesia
              </p>
            </div>

            <div class="contact-card">
              <div class="contact-icon">
                <i class="fas fa-phone-alt"></i>
              </div>
              <h4 class="contact-label">Telepon</h4>
              <p class="contact-text">
                <strong>Customer Service:</strong> +62 21 1234 5678<br>
                <strong>Sales:</strong> +62 812 3456 7890<br>
                <strong>Emergency:</strong> +62 811 2233 4455
              </p>
            </div>

            <div class="contact-card">
              <div class="contact-icon">
                <i class="fas fa-envelope"></i>
              </div>
              <h4 class="contact-label">Email</h4>
              <p class="contact-text">
                <strong>Umum:</strong> info@QuicKlin.id<br>
                <strong>Customer Service:</strong> cs@QuicKlin.id<br>
                <strong>Kerjasama:</strong> partnership@QuicKlin.id
              </p>
            </div>

            <div class="contact-card">
              <div class="contact-icon">
                <i class="fas fa-clock"></i>
              </div>
              <h4 class="contact-label">Jam Operasional</h4>
              <p class="contact-text">
                <strong>Senin-Jumat:</strong> 08.00 - 17.00 WIB<br>
                <strong>Sabtu:</strong> 08.00 - 14.00 WIB<br>
                <strong>Minggu & Hari Libur:</strong> Tutup
              </p>
              <div class="social-media">
                <a href="#" class="social-icon"><i class="fab fa-facebook-f"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-twitter"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-instagram"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-linkedin-in"></i></a>
                <a href="#" class="social-icon"><i class="fab fa-youtube"></i></a>
              </div>
            </div>
          </div>

          <!-- Form Kontak -->
          <div class="col-md-6">
            <div class="contact-form">
              <h4 class="mb-4" style="color: var(--primary);">Kirim Pesan</h4>
              <form>
                <div class="mb-3">
                  <label for="name" class="form-label">Nama Lengkap</label>
                  <input type="text" class="form-control" id="name" required>
                </div>
                <div class="mb-3">
                  <label for="email" class="form-label">Email</label>
                  <input type="email" class="form-control" id="email" required>
                </div>
                <div class="mb-3">
                  <label for="phone" class="form-label">Nomor Telepon</label>
                  <input type="tel" class="form-control" id="phone">
                </div>
                <div class="mb-3">
                  <label for="subject" class="form-label">Subjek</label>
                  <select class="form-select" id="subject">
                    <option selected>Pilih subjek...</option>
                    <option>Informasi Layanan</option>
                    <option>Kerjasama Bisnis</option>
                    <option>Keluhan/Pengaduan</option>
                    <option>Lainnya</option>
                  </select>
                </div>
                <div class="mb-3">
                  <label for="message" class="form-label">Pesan</label>
                  <textarea class="form-control" id="message" rows="5" required></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim Pesan</button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<footer class="footer mt-auto">
  <div class="container">
    <div class="row">
      </div>
        <p class="mb-1">© <?= date('Y') ?> QuicKlin. All rights reserved.</p>
        <p class="mb-0 text-muted" style="font-size: 0.8rem;">Creating magical moments since 2015</p>
      </div>
    </div>
  </div>
</footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>