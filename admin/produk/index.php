<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once '../navbar.php';
require_once '../../koneksi/koneksi.php';
require_once '../../controllers/ProdukController.php';

// Initialize controller and handle requests
$controller = new ProdukController($koneksi);
$messages = $controller->handleAdminRequest();
$success = $messages['success'];
$error = $messages['error'];
$data = $controller->tampilkanSemua();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kelola Produk - Admin Panel</title>
    
    <!-- External CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        /* CSS Variables */
        :root {
            --primary-color: #3b76ec;
            --secondary-color: #2f6ebf;
            --success-color: #1ec6c9;
            --warning-color: #f6b219;
            --danger-color: #e74c3c;
            --light-color: #f8f9fa;
            --dark-color: #343a40;
            --sidebar-width: 250px;
            --border-radius: 15px;
            --box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        }

        /* Base Styles */
        body {
            background-color: var(--light-color);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            margin-left: var(--sidebar-width);
            padding: 0;
            min-height: 100vh;
        }

        /* Sidebar Styles */
        .sidebar {
            width: var(--sidebar-width);
            min-height: 100vh;
            background: linear-gradient(135deg, var(--secondary-color), var(--primary-color));
            color: white;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 1000;
            padding: 1.5rem 1rem;
            box-shadow: 2px 0 10px rgba(0,0,0,0.1);
        }

        .sidebar .brand {
            text-align: center;
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 1px solid rgba(255,255,255,0.2);
        }

        .sidebar .brand h4 {
            margin: 0;
            font-weight: 600;
            color: white;
        }

        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.8);
            padding: 12px 15px;
            border-radius: 10px;
            display: flex;
            align-items: center;
            margin-bottom: 8px;
            text-decoration: none;
            transition: all 0.3s ease;
            font-weight: 500;
        }

        .sidebar .nav-link:hover {
            background-color: rgba(255, 255, 255, 0.15);
            color: white;
            transform: translateX(5px);
        }

        .sidebar .nav-link.active {
            background-color: rgba(255, 255, 255, 0.2);
            color: white;
            box-shadow: 0 2px 10px rgba(255,255,255,0.1);
        }

        .sidebar .nav-link i {
            margin-right: 10px;
            width: 16px;
            text-align: center;
        }

        /* Main Content */
        .main-content {
            padding: 2rem;
            min-height: 100vh;
        }

        .page-header {
            margin-bottom: 2rem;
            padding-bottom: 1rem;
            border-bottom: 2px solid var(--primary-color);
        }

        .page-header h3 {
            color: var(--dark-color);
            font-weight: 600;
            margin: 0;
        }

        /* Cards */
        .card {
            border-radius: var(--border-radius);
            box-shadow: var(--box-shadow);
            border: none;
            margin-bottom: 2rem;
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border-radius: var(--border-radius) var(--border-radius) 0 0 !important;
            padding: 1rem 1.5rem;
            border: none;
        }

        .card-header h5 {
            margin: 0;
            font-weight: 600;
        }

        .card-body {
            padding: 1.5rem;
        }

        /* Form Styles */
        .form-label {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
        }

        .form-control {
            border-radius: 10px;
            border: 2px solid #e9ecef;
            padding: 0.75rem 1rem;
            transition: all 0.3s ease;
        }

        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(59, 118, 236, 0.25);
        }

        /* Button Styles */
        .btn {
            border-radius: 10px;
            padding: 0.6rem 1.5rem;
            font-weight: 600;
            transition: all 0.3s ease;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            border: none;
        }

        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(59, 118, 236, 0.4);
        }

        .btn-warning {
            background-color: var(--warning-color);
            border: none;
            color: white;
        }

        .btn-danger {
            background-color: var(--danger-color);
            border: none;
        }

        .btn-sm {
            padding: 0.4rem 1rem;
            font-size: 0.875rem;
        }

        /* Table Styles */
        .table {
            border-radius: 10px;
            overflow: hidden;
            box-shadow: var(--box-shadow);
        }

        .table thead th {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border: none;
            font-weight: 600;
            padding: 1rem;
        }

        .table tbody td {
            padding: 1rem;
            vertical-align: middle;
            border-bottom: 1px solid #e9ecef;
        }

        .table tbody tr:hover {
            background-color: rgba(59, 118, 236, 0.05);
        }

        /* Alert Styles */
        .alert {
            border-radius: 10px;
            border: none;
            padding: 1rem 1.5rem;
            margin-bottom: 1.5rem;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }

        /* Modal Styles */
        .modal-content {
            border-radius: var(--border-radius);
            border: none;
            box-shadow: 0 10px 30px rgba(0,0,0,0.2);
        }

        .modal-header {
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: white;
            border-radius: var(--border-radius) var(--border-radius) 0 0;
            border: none;
        }

        .modal-title {
            font-weight: 600;
        }

        .btn-close {
            filter: brightness(0) invert(1);
        }

        /* Price formatting */
        .price {
            font-weight: 700;
            color: var(--success-color);
            font-size: 1.1em;
        }

        /* Description truncate */
        .text-truncate-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

        /* Responsive */
        @media (max-width: 768px) {
            body {
                margin-left: 0;
            }
            
            .sidebar {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            
            .sidebar.show {
                transform: translateX(0);
            }
            
            .main-content {
                padding: 1rem;
            }
        }

        /* Custom Utilities */
        .fade-in {
            animation: fadeIn 0.5s ease-in;
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</head>

<body>
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="brand">
            <h4><i class="fas fa-cog me-2"></i>Admin Panel</h4>
        </div>
        <nav>
            <a class="nav-link" href="../dashboard.php">
                <i class="fas fa-tachometer-alt"></i>
                Dashboard
            </a>
            <a class="nav-link" href="../artikel/index.php">
                <i class="fas fa-newspaper"></i>
                Artikel
            </a>
            <a class="nav-link active" href="index.php">
                <i class="fas fa-box"></i>
                Produk
            </a>
            <a class="nav-link" href="../keluar.php">
                <i class="fas fa-sign-out-alt"></i>
                Logout
            </a>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="main-content fade-in">
        <!-- Page Header -->
        <div class="page-header">
            <h3><i class="fas fa-box me-2"></i>Kelola Produk</h3>
        </div>

        <!-- Alert Messages -->
        <?php if ($success): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i><?= htmlspecialchars($success) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <?php if ($error): ?>
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <i class="fas fa-exclamation-circle me-2"></i><?= htmlspecialchars($error) ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <!-- Add Product Form -->
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-plus me-2"></i>Tambah Produk Baru</h5>
            </div>
            <div class="card-body">
                <form method="post">
                    <input type="hidden" name="action" value="add">
                    
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="nama_produk_add" class="form-label">
                                <i class="fas fa-tag me-1"></i>Nama Produk
                            </label>
                            <input type="text" 
                                   name="nama_produk" 
                                   id="nama_produk_add" 
                                   class="form-control" 
                                   placeholder="Masukkan nama produk..." 
                                   required>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="harga_add" class="form-label">
                                <i class="fas fa-dollar-sign me-1"></i>Harga
                            </label>
                            <input type="number" 
                                   name="harga" 
                                   id="harga_add" 
                                   class="form-control" 
                                   placeholder="0.00" 
                                   step="0.01" 
                                   min="0"
                                   required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="deskripsi_add" class="form-label">
                                <i class="fas fa-align-left me-1"></i>Deskripsi
                            </label>
                            <textarea name="deskripsi" 
                                      id="deskripsi_add" 
                                      class="form-control" 
                                      rows="4" 
                                      placeholder="Tulis deskripsi produk di sini..." 
                                      required></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Tambah Produk
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Products List -->
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-list me-2"></i>Daftar Produk</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th style="width: 25%;">
                                    <i class="fas fa-tag me-1"></i>Nama Produk
                                </th>
                                <th style="width: 40%;">
                                    <i class="fas fa-align-left me-1"></i>Deskripsi
                                </th>
                                <th style="width: 20%;">
                                    <i class="fas fa-dollar-sign me-1"></i>Harga
                                </th>
                                <th style="width: 15%;" class="text-center">
                                    <i class="fas fa-cogs me-1"></i>Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($data && $data->num_rows > 0): ?>
                                <?php while ($row = $data->fetch_assoc()): ?>
                                    <tr>
                                        <td>
                                            <strong><?= htmlspecialchars($row['nama_produk'] ?? '') ?></strong>
                                        </td>
                                        <td>
                                            <div class="text-truncate-3">
                                                <?= nl2br(htmlspecialchars(substr($row['deskripsi'] ?? '', 0, 150))) ?>
                                                <?= (strlen($row['deskripsi'] ?? '') > 150) ? '...' : '' ?>
                                            </div>
                                        </td>
                                        <td>
                                            <span class="price">Rp <?= number_format($row['harga'] ?? 0, 2, ',', '.') ?></span>
                                        </td>
                                        <td>
                                            <div class="btn-group-vertical d-grid gap-1">
                                                <button type="button" 
                                                        class="btn btn-warning btn-sm" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#editProdukModal"
                                                        data-id="<?= htmlspecialchars($row['id'] ?? '') ?>"
                                                        data-nama_produk="<?= htmlspecialchars($row['nama_produk'] ?? '') ?>"
                                                        data-deskripsi="<?= htmlspecialchars($row['deskripsi'] ?? '') ?>"
                                                        data-harga="<?= htmlspecialchars($row['harga'] ?? '') ?>"
                                                        title="Edit Produk">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <a href="?action=delete&id=<?= htmlspecialchars($row['id'] ?? '') ?>" 
                                                   class="btn btn-danger btn-sm" 
                                                   onclick="return confirm('Apakah Anda yakin ingin menghapus produk ini?');"
                                                   title="Hapus Produk">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="4" class="text-center py-4">
                                        <div class="text-muted">
                                            <i class="fas fa-inbox fa-3x mb-3"></i>
                                            <h5>Tidak ada produk</h5>
                                            <p>Belum ada produk yang tersedia. Silakan tambah produk baru.</p>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Edit Product Modal -->
    <div class="modal fade" id="editProdukModal" tabindex="-1" aria-labelledby="editProdukModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editProdukModalLabel">
                        <i class="fas fa-edit me-2"></i>Edit Produk
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <form id="editProdukForm" method="post">
                    <div class="modal-body">
                        <input type="hidden" name="action" value="edit">
                        <input type="hidden" name="id" id="edit_id">
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label for="edit_nama_produk" class="form-label">
                                    <i class="fas fa-tag me-1"></i>Nama Produk
                                </label>
                                <input type="text" 
                                       name="nama_produk" 
                                       id="edit_nama_produk" 
                                       class="form-control" 
                                       required>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="edit_harga" class="form-label">
                                    <i class="fas fa-dollar-sign me-1"></i>Harga
                                </label>
                                <input type="number" 
                                       name="harga" 
                                       id="edit_harga" 
                                       class="form-control" 
                                       step="0.01" 
                                       min="0"
                                       required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="edit_deskripsi" class="form-label">
                                    <i class="fas fa-align-left me-1"></i>Deskripsi
                                </label>
                                <textarea name="deskripsi" 
                                          id="edit_deskripsi" 
                                          class="form-control" 
                                          rows="4" 
                                          required></textarea>
                            </div>
                        </div>
                    </div>
                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                            <i class="fas fa-times me-2"></i>Batal
                        </button>
                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save me-2"></i>Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Edit Modal Handler
            const editProdukModal = document.getElementById('editProdukModal');
            if (editProdukModal) {
                editProdukModal.addEventListener('show.bs.modal', function (event) {
                    const button = event.relatedTarget;
                    const id = button.getAttribute('data-id');
                    const nama_produk = button.getAttribute('data-nama_produk');
                    const deskripsi = button.getAttribute('data-deskripsi');
                    const harga = button.getAttribute('data-harga');

                    // Populate modal fields
                    document.getElementById('edit_id').value = id;
                    document.getElementById('edit_nama_produk').value = nama_produk;
                    document.getElementById('edit_deskripsi').value = deskripsi;
                    document.getElementById('edit_harga').value = harga;
                });
            }

            // Auto-hide alerts after 5 seconds
            const alerts = document.querySelectorAll('.alert');
            alerts.forEach(function(alert) {
                setTimeout(function() {
                    const bsAlert = new bootstrap.Alert(alert);
                    bsAlert.close();
                }, 5000);
            });

            // Format price input on blur
            const priceInputs = document.querySelectorAll('input[type="number"][name="harga"]');
            priceInputs.forEach(function(input) {
                input.addEventListener('blur', function() {
                    if (this.value) {
                        this.value = parseFloat(this.value).toFixed(2);
                    }
                });
            });
        });
    </script>
</body>
</html>