<?php
require_once 'koneksi/koneksi.php';
require_once 'controllers/DaftarController.php';

$controller = new DaftarController($koneksi);
$controller->handleRequest();
?>

<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Daftar Admin</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
  <style>
    :root {
      --yellow: #f6b219;
      --magenta: rgb(59, 118, 236); /* Biru utama QuicKlin */
      --coral: rgb(94, 146, 242);   /* Biru muda/soft QuicKlin */
      --teal: #1ec6c9;              /* Hijau toska QuicKlin */
      --blue: #2f6ebf;              /* Biru gelap QuicKlin */

      /* Mapping ke variabel Bootstrap default */
      --bs-primary: var(--magenta);
      --bs-secondary: var(--blue);
      --bs-success: var(--teal);
      --bs-info: var(--coral);
      --bs-warning: var(--yellow);
      --bs-danger: #e74c3c;
      --bs-light: #f8f9fa;
      --bs-dark: #343a40;
    }

    body {
      background-color: var(--bs-light);
      height: 100vh;
      display: flex;
      justify-content: center;
      align-items: center;
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .card {
      max-width: 450px;
      width: 100%;
      background-color: white;
      border-radius: 15px;
      box-shadow: 0 10px 30px rgba(0,0,0,0.15);
      padding: 40px;
      text-align: center;
    }

    .card h4 {
      font-size: 2.2rem;
      font-weight: 800;
      background: linear-gradient(45deg, var(--magenta), var(--yellow));
      -webkit-background-clip: text;
      background-clip: text;
      color: transparent;
      margin-bottom: 10px;
      letter-spacing: 1px;
    }

    .login-subtitle {
      font-size: 1.1rem;
      color: #6c757d;
      margin-bottom: 30px;
    }

    .form-label {
      font-weight: 500;
      color: var(--bs-dark);
      text-align: left;
      display: block;
      margin-bottom: 8px;
    }

    .form-control {
      border-radius: 8px;
      padding: 12px 15px;
      border: 1px solid #ced4da;
      transition: all 0.3s ease;
    }

    .form-control:focus {
      border-color: var(--magenta);
      box-shadow: 0 0 0 0.25rem rgba(59, 118, 236, 0.25);
    }

    .btn-primary {
      background-color: var(--magenta);
      border-color: var(--magenta);
      padding: 12px 20px;
      border-radius: 10px;
      font-weight: 600;
      transition: all 0.3s ease;
    }

    .btn-primary:hover {
      background-color: var(--blue);
      border-color: var(--blue);
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(59, 118, 236, 0.3);
    }

    .alert {
      border-radius: 8px;
      font-size: 0.95rem;
      margin-bottom: 20px;
      text-align: left;
    }
  </style>
</head>
<body>

<div class="card p-4">
  <h4 class="text-center mb-4">Daftar Admin</h4>
  <p class="login-subtitle">Buat Akun Admin Baru</p>

  <?php if ($controller->success): ?>
    <div class="alert alert-success"><?= htmlspecialchars($controller->success) ?></div>
  <?php elseif ($controller->error): ?>
    <div class="alert alert-danger"><?= htmlspecialchars($controller->error) ?></div>
  <?php endif; ?>

  <form method="POST" action="">
    <input type="hidden" name="kode_admin" value="<?= htmlspecialchars($controller->newCode) ?>">

    <div class="mb-3">
      <label class="form-label">Kode Admin</label>
      <input type="text" class="form-control" value="<?= htmlspecialchars($controller->newCode) ?>" readonly>
    </div>

    <div class="mb-3">
      <label class="form-label">Nama Pengguna</label>
      <input type="text" class="form-control" name="username" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Email</label>
      <input type="email" class="form-control" name="email" required>
    </div>

    <div class="mb-3">
      <label class="form-label">Kata Sandi</label>
      <input type="password" class="form-control" name="password" required>
    </div>

    <button type="submit" class="btn btn-primary w-100 mt-3">Daftar</button>
  </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>