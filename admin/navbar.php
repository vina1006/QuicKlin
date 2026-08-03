<?php
if (!isset($_SESSION)) session_start();
if (!isset($_SESSION['admin'])) {
  header("Location:../masuk.php");
  exit;
}
$admin = $_SESSION['admin'];
?>

<!-- Sidebar Offcanvas -->
<div class="offcanvas offcanvas-start bg-dark text-white" tabindex="-1" id="sidebar">
  <div class="offcanvas-header">
    <h5 class="offcanvas-title">Menu Admin</h5>
    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
  </div>
  <div class="offcanvas-body">
    <p class="small text-white">Halo, <strong><?= $admin['username'] ?></strong></p>
    <hr class="text-secondary">
    <a href="../dashboard.php" class="d-block text-white py-1 text-decoration-none">🏠 Dashboard</a>
    <a href="artikel/index.php" class="d-block text-white py-1 text-decoration-none">📰 Artikel</a>
    <a href="paket/index.php" class="d-block text-white py-1 text-decoration-none">📦 Paket</a>
    <a href="#" class="nav-link"><i class="bi bi-camera"></i> Foto Klien</a>
    <a href="../../keluar.php" class="d-block text-danger py-1 text-decoration-none">🚪 Logout</a>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

