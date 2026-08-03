<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

include_once '../navbar.php';
require_once '../../koneksi/koneksi.php';
require_once '../../controllers/ArtikelController.php';

// Initialize controller and handle requests
$controller = new ArtikelController($koneksi);
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
    <title>Kelola Artikel - Admin Panel</title>
    
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

        /* Image Styles */
        .article-image {
            border-radius: 8px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            max-width: 100%;
            height: auto;
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
        .text-truncate-3 {
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
        }

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
            <a class="nav-link active" href="index.php">
                <i class="fas fa-newspaper"></i>
                Artikel
            </a>
            <a class="nav-link" href="produk.php">
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
            <h3><i class="fas fa-newspaper me-2"></i>Kelola Artikel</h3>
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

        <!-- Add Article Form -->
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-plus me-2"></i>Tambah Artikel Baru</h5>
            </div>
            <div class="card-body">
                <form method="post" enctype="multipart/form-data">
                    <input type="hidden" name="action" value="add">
                    
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="judul_add" class="form-label">
                                <i class="fas fa-heading me-1"></i>Judul Artikel
                            </label>
                            <input type="text" 
                                   name="judul" 
                                   id="judul_add" 
                                   class="form-control" 
                                   placeholder="Masukkan judul artikel..." 
                                   required>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label for="isi_add" class="form-label">
                                <i class="fas fa-align-left me-1"></i>Isi Artikel
                            </label>
                            <textarea name="isi" 
                                      id="isi_add" 
                                      class="form-control" 
                                      rows="6" 
                                      placeholder="Tulis isi artikel di sini..." 
                                      required></textarea>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="gambar_add" class="form-label">
                                <i class="fas fa-image me-1"></i>Gambar Artikel (Opsional)
                            </label>
                            <input type="file" 
                                   name="gambar" 
                                   id="gambar_add" 
                                   class="form-control"
                                   accept="image/*">
                            <div class="form-text">
                                <i class="fas fa-info-circle me-1"></i>
                                Format yang didukung: JPG, PNG, GIF (Maks. 2MB)
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save me-2"></i>Tambah Artikel
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        <!-- Articles List -->
        <div class="card">
            <div class="card-header">
                <h5><i class="fas fa-list me-2"></i>Daftar Artikel</h5>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th style="width: 25%;">
                                    <i class="fas fa-heading me-1"></i>Judul
                                </th>
                                <th style="width: 35%;">
                                    <i class="fas fa-align-left me-1"></i>Isi
                                </th>
                                <th style="width: 15%;" class="text-center">
                                    <i class="fas fa-image me-1"></i>Gambar
                                </th>
                                <th style="width: 15%;">
                                    <i class="fas fa-calendar me-1"></i>Tanggal
                                </th>
                                <th style="width: 10%;" class="text-center">
                                    <i class="fas fa-cogs me-1"></i>Aksi
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($data && $data->num_rows > 0): ?>
                                <?php while ($row = $data->fetch_assoc()): ?>
                                    <tr>
                                        <td>
                                            <strong><?= htmlspecialchars($row['judul'] ?? '') ?></strong>
                                        </td>
                                        <td>
                                            <div class="text-truncate-3">
                                                <?= nl2br(htmlspecialchars(substr($row['isi'] ?? '', 0, 150))) ?>
                                                <?= (strlen($row['isi'] ?? '') > 150) ? '...' : '' ?>
                                            </div>
                                        </td>
                                        <td class="text-center">
                                            <?php if (!empty($row['gambar'])): ?>
                                                <img src="../../uploads/<?= htmlspecialchars($row['gambar']) ?>" 
                                                     width="60" 
                                                     height="60"
                                                     class="article-image rounded"
                                                     style="object-fit: cover;"
                                                     alt="Gambar Artikel">
                                            <?php else: ?>
                                                <div class="text-muted">
                                                    <i class="fas fa-image fa-2x"></i>
                                                    <br><small>Tidak ada</small>
                                                </div>
                                            <?php endif; ?>
                                        </td>
                                        <td>
                                            <small class="text-muted">
                                                <?= date('d/m/Y H:i', strtotime($row['tanggal_dibuat'] ?? '')) ?>
                                            </small>
                                        </td>
                                        <td>
                                            <div class="btn-group-vertical d-grid gap-1">
                                                <button type="button" 
                                                        class="btn btn-warning btn-sm" 
                                                        data-bs-toggle="modal" 
                                                        data-bs-target="#editArtikelModal"
                                                        data-id="<?= htmlspecialchars($row['id'] ?? '') ?>"
                                                        data-judul="<?= htmlspecialchars($row['judul'] ?? '') ?>"
                                                        data-isi="<?= htmlspecialchars($row['isi'] ?? '') ?>"
                                                        data-gambar="<?= htmlspecialchars($row['gambar'] ?? '') ?>"
                                                        title="Edit Artikel">
                                                    <i class="fas fa-edit"></i>
                                                </button>
                                                <a href="?action=delete&id=<?= htmlspecialchars($row['id'] ?? '') ?>" 
                                                   class="btn btn-danger btn-sm" 
                                                   onclick="return confirm('Apakah Anda yakin ingin menghapus artikel ini?');"
                                                   title="Hapus Artikel">
                                                    <i class="fas fa-trash"></i>
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endwhile; ?>
                            <?php else: ?>
                                <tr>
                                    <td colspan="5" class="text-center py-4">
                                        <div class="text-muted">
                                            <i class="fas fa-inbox fa-3x mb-3"></i>
                                            <h5>Tidak ada artikel</h5>
                                            <p>Belum ada artikel yang tersedia. Silakan tambah artikel baru.</p>
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

    <!-- Edit Article Modal -->
    <div class="modal fade" id="editArtikelModal" tabindex="-1" aria-labelledby="editArtikelModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editArtikelModalLabel">
                        <i class="fas fa-edit me-2"></i>Edit Artikel
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <form id="editArtikelForm" method="post" enctype="multipart/form-data">
                    <div class="modal-body">
                        <input type="hidden" name="action" value="edit">
                        <input type="hidden" name="id" id="edit_id">
                        <input type="hidden" name="gambar_lama" id="edit_gambar_lama">
                        
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="edit_judul" class="form-label">
                                    <i class="fas fa-heading me-1"></i>Judul
                                </label>
                                <input type="text" 
                                       name="judul" 
                                       id="edit_judul" 
                                       class="form-control" 
                                       required>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="edit_isi" class="form-label">
                                    <i class="fas fa-align-left me-1"></i>Isi
                                </label>
                                <textarea name="isi" 
                                          id="edit_isi" 
                                          class="form-control" 
                                          rows="6" 
                                          required></textarea>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 mb-3">
                                <label class="form-label">
                                    <i class="fas fa-image me-1"></i>Gambar Saat Ini
                                </label>
                                <div id="current_gambar_display" class="mb-2"></div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="edit_gambar" class="form-label">
                                    <i class="fas fa-upload me-1"></i>Ganti Gambar (Opsional)
                                </label>
                                <input type="file" 
                                       name="gambar" 
                                       id="edit_gambar" 
                                       class="form-control"
                                       accept="image/*">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="form-check">
                                    <input class="form-check-input" 
                                           type="checkbox" 
                                           value="1" 
                                           id="remove_gambar" 
                                           name="remove_gambar">
                                    <label class="form-check-label" for="remove_gambar">
                                        <i class="fas fa-trash me-1"></i>Hapus Gambar Saat Ini
                                    </label>
                                </div>
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
            const editArtikelModal = document.getElementById('editArtikelModal');
            if (editArtikelModal) {
                editArtikelModal.addEventListener('show.bs.modal', function (event) {
                    const button = event.relatedTarget;
                    const id = button.getAttribute('data-id');
                    const judul = button.getAttribute('data-judul');
                    const isi = button.getAttribute('data-isi');
                    const gambar = button.getAttribute('data-gambar');

                    // Populate modal fields
                    document.getElementById('edit_id').value = id;
                    document.getElementById('edit_judul').value = judul;
                    document.getElementById('edit_isi').value = isi;
                    document.getElementById('edit_gambar_lama').value = gambar;

                    // Handle current image display
                    const currentGambarDisplay = document.getElementById('current_gambar_display');
                    const removeGambarCheckbox = document.getElementById('remove_gambar');
                    
                    currentGambarDisplay.innerHTML = '';
                    
                    if (gambar) {
                        const imgContainer = document.createElement('div');
                        imgContainer.className = 'text-center p-3 border rounded';
                        imgContainer.innerHTML = `
                            <img src="../../uploads/${gambar}" 
                                 class="img-fluid rounded" 
                                 style="max-width: 200px; max-height: 150px; object-fit: cover;" 
                                 alt="Current Image">
                            <p class="mt-2 mb-0 text-muted small">${gambar}</p>
                        `;
                        currentGambarDisplay.appendChild(imgContainer);
                        removeGambarCheckbox.disabled = false;
                    } else {
                        currentGambarDisplay.innerHTML = `
                            <div class="text-center p-3 border rounded text-muted">
                                <i class="fas fa-image fa-2x mb-2"></i>
                                <p class="mb-0">Tidak ada gambar saat ini</p>
                            </div>
                        `;
                        removeGambarCheckbox.disabled = true;
                    }
                    
                    removeGambarCheckbox.checked = false;
                });
            }

            // Remove image checkbox handler
            const removeGambarCheckbox = document.getElementById('remove_gambar');
            const editGambarInput = document.getElementById('edit_gambar');

            if (removeGambarCheckbox && editGambarInput) {
                removeGambarCheckbox.addEventListener('change', function() {
                    if (this.checked) {
                        editGambarInput.value = '';
                        editGambarInput.disabled = true;
                    } else {
                        editGambarInput.disabled = false;
                    }
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

            // File input validation
            const fileInputs = document.querySelectorAll('input[type="file"]');
            fileInputs.forEach(function(input) {
                input.addEventListener('change', function(e) {
                    const file = e.target.files[0];
                    if (file) {
                        // Check file size (2MB limit)
                        if (file.size > 2 * 1024 * 1024) {
                            alert('Ukuran file terlalu besar. Maksimal 2MB.');
                            e.target.value = '';
                            return;
                        }
                        
                        // Check file type
                        const allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
                        if (!allowedTypes.includes(file.type)) {
                            alert('Format file tidak didukung. Gunakan JPG, PNG, atau GIF.');
                            e.target.value = '';
                            return;
                        }
                    }
                });
            });
        });
    </script>
</body>
</html>