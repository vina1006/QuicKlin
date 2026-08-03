<?php
session_start();
require_once 'koneksi/koneksi.php';
require_once 'controllers/MasukController.php'; // Asumsi MasukController.php ada di controllers/

$controller = new MasukController($koneksi);
$controller->handleLogin();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Login Admin - QuicKlin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        /* Variabel warna dari desain QuicKlin sebelumnya */
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
            background-color: var(--bs-light); /* Latar belakang body sesuai tema */
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Font konsisten */
        }

        .login-container {
            max-width: 450px; /* Lebar card login */
            width: 100%;
            background-color: white;
            border-radius: 15px; /* Lebih rounded */
            box-shadow: 0 10px 30px rgba(0,0,0,0.15); /* Shadow lebih menonjol */
            padding: 40px; /* Padding lebih besar */
            text-align: center;
        }

        .company-logo {
            max-width: 80px; /* Ukuran logo di login */
            height: auto;
            margin-bottom: 20px;
        }

        .company-name-login {
            font-size: 2.2rem; /* Ukuran font lebih besar untuk judul */
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
            display: block; /* Pastikan label di atas input */
            margin-bottom: 8px;
        }

        .form-control {
            border-radius: 8px; /* Rounded input fields */
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
            border-radius: 10px; /* Rounded button */
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

<div class="login-container">
    <img src="img/logo/logo1.png" alt="QuicKlin Logo" class="company-logo">
    <h1 class="company-name-login">QuicKlin</h1>
    <p class="login-subtitle">Admin Panel Login</p>

    <?php if ($controller->error): ?>
        <div class="alert alert-danger"><?= $controller->error ?></div>
    <?php endif; ?>

    <form method="POST" action="">
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="mb-3">
            <label for="password" class="form-label">Kata Sandi</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <button type="submit" class="btn btn-primary w-100 mt-3">Masuk</button>
    </form>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
