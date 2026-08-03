<?php
session_start();
if (!isset($_SESSION['admin'])) {
    header("Location: ../masuk.php");
    exit;
}

// Database connection
$host = 'localhost';
$username = 'root'; // Ganti dengan username database Anda
$password = ''; // Ganti dengan password database Anda
$database = 'clean'; // Ganti dengan nama database Anda

try {
    $pdo = new PDO("mysql:host=$host;dbname=$database", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Fetch total articles
    $stmt = $pdo->query("SELECT COUNT(*) as total FROM artikel");
    $totalArtikel = $stmt->fetch(PDO::FETCH_ASSOC)['total'];

    // Fetch total products
    $stmt = $pdo->query("SELECT COUNT(*) as total FROM produk");
    $totalProduk = $stmt->fetch(PDO::FETCH_ASSOC)['total'];
} catch (PDOException $e) {
    echo "Database error: " . $e->getMessage();
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin - QuicKlin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --yellow: #f6b219;
            --magenta: rgb(59, 118, 236);
            --coral: rgb(94, 146, 242);
            --teal: #1ec6c9;
            --blue: #2f6ebf;

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
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .company-header {
            background-color: white;
            border-bottom: 1px solid rgba(0,0,0,0.1);
            padding: 15px 0;
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
        
        .company-slogan {
            font-size: 0.9rem;
            color: #6c757d;
            margin-bottom: 0;
        }

        .sidebar {
            width: 250px;
            min-height: 100vh;
            background: var(--bs-secondary);
            color: white;
            position: fixed;
            transition: all 0.3s;
            z-index: 1000;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        }
        
        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 12px 20px;
            transition: background-color 0.2s ease, color 0.2s ease;
            border-radius: 8px;
            margin-bottom: 5px;
        }
        
        .sidebar .nav-link.active,
        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.15);
            color: white;
        }
        
        .sidebar hr {
            border-top: 1px solid rgba(255, 255, 255, 0.2);
        }

        .main-content {
            margin-left: 250px;
            padding: 20px;
            transition: all 0.3s;
        }
        
        .card {
            border: none;
            border-radius: 15px;
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .card:hover {
            transform: translateY(-8px);
            box-shadow: 0 15px 35px rgba(0,0,0,0.15);
        }
        
        .card-primary {
            background: linear-gradient(135deg, var(--bs-primary), #2980b9);
            color: white;
        }
        
        .card-success {
            background: linear-gradient(135deg, var(--bs-success), #16a085);
            color: white;
        }
        
        .card-warning {
            background: linear-gradient(135deg, var(--bs-warning), #f39c12);
            color: white;
        }
        
        .card-info {
            background: linear-gradient(135deg, var(--bs-info), #3498db);
            color: white;
        }
        
        .welcome-header {
            background: white;
            border-radius: 15px;
            padding: 25px;
            margin-bottom: 25px;
            box-shadow: 0 5px 15px rgba(0,0,0,0.05);
        }
        
        .welcome-header h3 {
            color: var(--bs-dark);
            font-weight: 600;
        }

        .stat-icon {
            font-size: 2.5rem;
            opacity: 0.7;
        }

        .fs-3 {
            font-size: 2.2rem !important;
            font-weight: 700;
        }
        
        @media (max-width: 768px) {
            .sidebar {
                margin-left: -250px;
            }
            .main-content {
                margin-left: 0;
            }
            .sidebar.active {
                margin-left: 0;
            }
            .company-header {
                position: relative;
                padding-left: 60px;
            }
            .toggle-sidebar-btn {
                display: block !important;
            }
        }
    </style>
</head>
<body>

<div class="row align-items-center company-header">
    <div class="col-md-2 col-4 text-center">
        <img src="../img/logo/logo1.png" alt="QuicKlin Logo" class="logo-img rounded-circle">
    </div>
    <div class="col-md-10 col-8 text-center text-md-start">
        <div class="company-name">QuicKlin</div>
        <p class="company-slogan">Solusi Kebersihan Profesional</p>
    </div>
</div>

<button class="btn btn-primary d-md-none toggle-sidebar-btn position-fixed" style="top: 15px; left: 15px; z-index: 1001;">
    <i class="fas fa-bars"></i>
</button>

<div class="sidebar">
    <div class="p-4">
        <h4 class="text-center mb-4">Admin Panel</h4>
        <hr>
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link active text-white" href="dashboard.php">
                    <i class="fas fa-tachometer-alt me-2"></i> Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="artikel/index.php">
                    <i class="fas fa-newspaper me-2"></i> Artikel
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link text-white" href="produk/index.php">
                    <i class="fas fa-box me-2"></i> Produk
                </a>
            </li>
            <li class="nav-item mt-4">
                <a class="nav-link text-white" href="../keluar.php">
                    <i class="fas fa-sign-out-alt me-2"></i> Logout
                </a>
            </li>
        </ul>
    </div>
</div>

<div class="main-content">
    <div class="welcome-header">
        <h3>Selamat Datang, <strong><?= htmlspecialchars($_SESSION['admin']['nama'] ?? 'Admin') ?></strong></h3>
        <p class="text-muted mb-0"><?= date('l, d F Y') ?></p>
    </div>

    <div class="row g-4 mt-2">
        <div class="col-xl-3 col-md-6">
            <div class="card card-primary p-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-newspaper stat-icon me-3"></i>
                    <div>
                        <h6 class="mb-1 opacity-75">Total Artikel</h6>
                        <div class="fs-3 fw-bold"><?= htmlspecialchars($totalArtikel) ?></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-3 col-md-6">
            <div class="card card-success p-4">
                <div class="d-flex align-items-center">
                    <i class="fas fa-box stat-icon me-3"></i>
                    <div>
                        <h6 class="mb-1 opacity-75">Total Produk</h6>
                        <div class="fs-3 fw-bold"><?= htmlspecialchars($totalProduk) ?></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.querySelector('.sidebar');
        const toggleBtn = document.querySelector('.toggle-sidebar-btn');
        
        if (toggleBtn) {
            toggleBtn.addEventListener('click', function() {
                sidebar.classList.toggle('active');
            });
        }

        document.querySelector('.main-content').addEventListener('click', function() {
            if (window.innerWidth <= 768 && sidebar.classList.contains('active')) {
                sidebar.classList.remove('active');
            }
        });
    });
</script>
</body>
</html>