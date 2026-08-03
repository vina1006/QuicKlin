<!-- Bootstrap Icons -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

<style>
  :root {
    --yellow: #f6b219;
    --magenta: rgb(59, 118, 236);
    --coral: rgb(94, 146, 242);
    --teal: #1ec6c9;
    --blue: #2f6ebf;
    --gradient-bg: linear-gradient(135deg, rgba(246, 178, 25, 0.15), rgba(59, 118, 236, 0.15));
  }

  .navbar-custom {
    background: linear-gradient(to right, #ffffff, rgba(248, 249, 250, 0.9));
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
    padding: 10px 20px;
    position: sticky;
    top: 0;
    z-index: 1030;
    transition: all 0.3s ease;
  }

  .navbar-custom.scrolled {
    background: linear-gradient(to right, #ffffff, #f8f9fa);
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.1);
  }

  .navbar-custom .navbar-brand {
    font-size: 1.8rem;
    font-weight: 700;
    background: linear-gradient(45deg, var(--magenta), var(--yellow));
    -webkit-background-clip: text;
    background-clip: text;
    color: transparent;
    transition: transform 0.3s ease;
  }

  .navbar-custom .navbar-brand:hover {
    transform: scale(1.05);
  }

  .navbar-custom .nav-link {
    position: relative;
    font-weight: 500;
    color: #333;
    padding: 10px 15px;
    transition: all 0.3s ease;
  }

  .navbar-custom .nav-link:hover {
    color: var(--magenta);
  }

  .navbar-custom .nav-link::after {
    content: "";
    position: absolute;
    left: 50%;
    bottom: 5px;
    width: 0;
    height: 2px;
    background: var(--magenta);
    transition: width 0.3s ease, left 0.3s ease;
  }

  .navbar-custom .nav-link:hover::after {
    width: 100%;
    left: 0;
  }

  .navbar-custom .nav-link.active {
    color: var(--magenta);
    font-weight: 600;
  }

  .navbar-custom .nav-link.active::after {
    width: 100%;
    left: 0;
  }

  .navbar-custom .navbar-toggler {
    border: none;
    font-size: 1.2rem;
    color: var(--magenta);
    transition: all 0.3s ease;
  }

  .navbar-custom .navbar-toggler:focus {
    box-shadow: none;
  }

  .navbar-custom .navbar-toggler:hover {
    color: var(--yellow);
    transform: rotate(90deg);
  }

  .dropdown-menu {
    max-height: 300px;
    overflow-y: auto;
    border-radius: 10px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    background: white;
    border: none;
    animation: fadeIn 0.3s ease;
  }

  .dropdown-item {
    padding: 10px 20px;
    font-weight: 500;
    transition: all 0.3s ease;
  }

  .dropdown-item:hover, .dropdown-item.active {
    background-color: rgba(59, 118, 236, 0.1);
    color: var(--magenta);
    border-left: 4px solid var(--magenta);
    transform: translateX(5px);
  }

  @media (max-width: 768px) {
    .navbar-custom .navbar-collapse {
      background: linear-gradient(to bottom, #ffffff, #f8f9fa);
      padding: 15px;
      border-radius: 10px;
      margin-top: 10px;
      box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }

    .dropdown-menu {
      margin-left: 0;
      width: 100%;
    }

    .navbar-custom .nav-link {
      padding: 8px 10px;
    }
  }

  @keyframes fadeIn {
    from { opacity: 0; transform: translateY(-10px); }
    to { opacity: 1; transform: translateY(0); }
  }
</style>

<!-- Navbar -->
<nav class="navbar navbar-expand-md navbar-custom" id="mainNavbar">
  <div class="container-fluid">
    <a class="navbar-brand fw-bold text-primary" href="index.php">QuicKlin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMenu" aria-controls="navbarMenu" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    
    <div class="collapse navbar-collapse justify-content-end" id="navbarMenu">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link<?= basename($_SERVER['PHP_SELF']) == 'index.php' ? ' active' : '' ?>" href="index.php">
            <i class="bi bi-house-door-fill"></i> Beranda
          </a>
        </li>
        <li class="nav-item">
          <a class="nav-link<?= basename($_SERVER['PHP_SELF']) == 'profil.php' ? ' active' : '' ?>" href="profil.php">
            <i class="bi bi-building"></i> Profil
          </a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle<?= basename($_SERVER['PHP_SELF']) == 'produk.php' || basename($_SERVER['PHP_SELF']) == 'produk_detail.php' ? ' active' : '' ?>" 
             href="#" 
             id="produkDropdown" 
             role="button" 
             data-bs-toggle="dropdown" 
             aria-expanded="false">
            <i class="bi bi-box-seam"></i> Produk Kami
          </a>
          <ul class="dropdown-menu" aria-labelledby="produkDropdown">
            <?php
            require_once 'koneksi/koneksi.php';
            require_once 'models/Produk.php';
            $produkModel = new Produk($koneksi);
            $daftarProduk = $produkModel->getAll();
            
            if ($daftarProduk && $daftarProduk->num_rows > 0): ?>
              <?php while ($row = $daftarProduk->fetch_assoc()): ?>
                <li>
                  <a class="dropdown-item<?= (isset($_GET['id']) && $_GET['id'] == $row['id']) ? ' active' : '' ?>" 
                     href="produk_detail.php?id=<?= $row['id'] ?>">
                    <?= htmlspecialchars($row['nama_produk']) ?>
                  </a>
                </li>
              <?php endwhile; ?>
            <?php else: ?>
              <li><a class="dropdown-item text-muted" href="#">Belum ada produk</a></li>
            <?php endif; ?>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link<?= basename($_SERVER['PHP_SELF']) == 'kontak.php' ? ' active' : '' ?>" href="kontak.php">
            <i class="bi bi-telephone-fill"></i> Kontak
          </a>
        </li>
      </ul>
    </div>
  </div>
</nav>

<script>
  document.addEventListener('scroll', () => {
    const navbar = document.getElementById('mainNavbar');
    if (window.scrollY > 50) {
      navbar.classList.add('scrolled');
    } else {
      navbar.classList.remove('scrolled');
    }
  });
</script>