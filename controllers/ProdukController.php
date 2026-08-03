<?php
// controllers/ProdukController.php

// Pastikan koneksi dan model Produk dimuat
// Path ini relatif terhadap lokasi ProdukController.php
require_once __DIR__ . '/../koneksi/koneksi.php'; // Path ke koneksi.php
require_once __DIR__ . '/../models/Produk.php'; // Path ke model Produk

class ProdukController {
    private $produkModel; // Gunakan nama properti yang lebih deskriptif
    private $koneksi; // Simpan koneksi di sini juga jika diperlukan langsung oleh controller

    public function __construct($koneksi) {
        $this->koneksi = $koneksi; // Simpan koneksi
        $this->produkModel = new Produk($koneksi); // Menggunakan $koneksi untuk inisialisasi model
    }

    public function tampilkanSemua() {
        return $this->produkModel->getAll();
    }

    public function simpanProduk($nama_produk, $deskripsi, $harga) {
        return $this->produkModel->create($nama_produk, $deskripsi, $harga);
    }

    public function getProdukById($id) {
        return $this->produkModel->getById($id);
    }

    public function updateProduk($id, $nama_produk, $deskripsi, $harga) {
        return $this->produkModel->update($id, $nama_produk, $deskripsi, $harga);
    }

    public function deleteProduk($id) {
        return $this->produkModel->delete($id);
    }

    // Metode untuk menangani semua request admin (add, edit, delete)
    public function handleAdminRequest() {
        $success = '';
        $error = '';

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (isset($_POST['action'])) {
                if ($_POST['action'] === 'add') {
                    $nama_produk = trim($_POST['nama_produk']);
                    $deskripsi = trim($_POST['deskripsi']);
                    $harga = floatval($_POST['harga']);

                    // Validasi input
                    if (empty($nama_produk)) {
                        $error = "Nama produk tidak boleh kosong.";
                    } elseif (empty($deskripsi)) {
                        $error = "Deskripsi tidak boleh kosong.";
                    } elseif ($harga < 0) {
                        $error = "Harga tidak boleh negatif.";
                    } else {
                        if ($this->simpanProduk($nama_produk, $deskripsi, $harga)) {
                            $success = "Produk berhasil ditambahkan.";
                        } else {
                            $error = "Gagal menambahkan produk.";
                        }
                    }
                } elseif ($_POST['action'] === 'edit') {
                    $id = intval($_POST['id']);
                    $nama_produk = trim($_POST['nama_produk']);
                    $deskripsi = trim($_POST['deskripsi']);
                    $harga = floatval($_POST['harga']);

                    // Validasi input
                    if (empty($nama_produk)) {
                        $error = "Nama produk tidak boleh kosong.";
                    } elseif (empty($deskripsi)) {
                        $error = "Deskripsi tidak boleh kosong.";
                    } elseif ($harga < 0) {
                        $error = "Harga tidak boleh negatif.";
                    } else {
                        if ($this->updateProduk($id, $nama_produk, $deskripsi, $harga)) {
                            $success = "Produk berhasil diperbarui.";
                        } else {
                            $error = "Gagal memperbarui produk.";
                        }
                    }
                }
            }
        } elseif (isset($_GET['action']) && $_GET['action'] === 'delete') {
            $id = intval($_GET['id']);
            $produk_to_delete = $this->getProdukById($id);
            
            if ($produk_to_delete) {
                if ($this->deleteProduk($id)) {
                    $success = "Produk berhasil dihapus.";
                } else {
                    $error = "Gagal menghapus produk dari database.";
                }
            } else {
                $error = "Produk tidak ditemukan.";
            }
        }
        
        return ['success' => $success, 'error' => $error];
    }
}
?>