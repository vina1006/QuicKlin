<?php
// controllers/ArtikelController.php

// Pastikan koneksi dan model Artikel dimuat
// Path ini relatif terhadap lokasi ArtikelController.php
require_once __DIR__ . '/../koneksi/koneksi.php'; // Path ke koneksi.php
require_once __DIR__ . '/../models/Artikel.php'; // Path ke model Artikel

class ArtikelController {
    private $artikelModel; // Gunakan nama properti yang lebih deskriptif, misal $artikelModel
    private $koneksi; // Simpan koneksi di sini juga jika diperlukan langsung oleh controller untuk kasus khusus (misal upload)

    public function __construct($koneksi) {
        $this->koneksi = $koneksi; // Simpan koneksi
        $this->artikelModel = new Artikel($koneksi); // Menggunakan $koneksi untuk inisialisasi model
    }

    public function tampilkanSemua() {
        return $this->artikelModel->getAll();
    }

    public function simpanArtikel($judul, $isi, $gambar = null) {
        return $this->artikelModel->create($judul, $isi, $gambar);
    }

    public function getArtikelById($id) {
        return $this->artikelModel->getById($id);
    }

    public function updateArtikel($id, $judul, $isi, $gambar = null) {
        return $this->artikelModel->update($id, $judul, $isi, $gambar);
    }

    public function deleteArtikel($id) {
        return $this->artikelModel->delete($id);
    }

    // Metode untuk menangani semua request admin (add, edit, delete)
    public function handleAdminRequest($uploadDir = "../../uploads/") { // Berikan default upload directory
        $success = '';
        $error = '';

        // Pastikan direktori upload ada
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        if ($_SERVER["REQUEST_METHOD"] === "POST") {
            if (isset($_POST['action'])) {
                if ($_POST['action'] === 'add') {
                    $judul = $_POST['judul'];
                    $isi = $_POST['isi'];
                    $gambar = null;

                    if (!empty($_FILES['gambar']['name'])) {
                        $gambar = uniqid() . "_" . basename($_FILES['gambar']['name']);
                        if (!move_uploaded_file($_FILES['gambar']['tmp_name'], $uploadDir . $gambar)) {
                            $error = "Gagal mengunggah gambar.";
                            $gambar = null; // Reset gambar if upload fails
                        }
                    }

                    if (empty($error)) {
                        if ($this->simpanArtikel($judul, $isi, $gambar)) {
                            $success = "Artikel berhasil ditambahkan.";
                        } else {
                            $error = "Gagal menambahkan artikel.";
                        }
                    }
                } elseif ($_POST['action'] === 'edit') {
                    $id = $_POST['id'];
                    $judul = $_POST['judul'];
                    $isi = $_POST['isi'];
                    $gambar_lama = $_POST['gambar_lama'] ?? null;
                    $gambar_baru_nama = $gambar_lama; // Default to old image

                    if (!empty($_FILES['gambar']['name'])) {
                        // Hapus gambar lama jika ada dan gambar baru diupload
                        if ($gambar_lama && file_exists($uploadDir . $gambar_lama)) {
                            unlink($uploadDir . $gambar_lama);
                        }
                        $gambar_baru_nama = uniqid() . "_" . basename($_FILES['gambar']['name']);
                        if (!move_uploaded_file($_FILES['gambar']['tmp_name'], $uploadDir . $gambar_baru_nama)) {
                            $error = "Gagal mengunggah gambar baru.";
                            $gambar_baru_nama = $gambar_lama; // Revert to old image if new upload fails
                        }
                    } elseif (isset($_POST['remove_gambar']) && $_POST['remove_gambar'] == '1') {
                         // Jika centang "hapus gambar"
                        if ($gambar_lama && file_exists($uploadDir . $gambar_lama)) {
                            unlink($uploadDir . $gambar_lama);
                        }
                        $gambar_baru_nama = null; // Set gambar menjadi NULL di database
                    }


                    if (empty($error)) {
                        if ($this->updateArtikel($id, $judul, $isi, $gambar_baru_nama)) {
                            $success = "Artikel berhasil diperbarui.";
                        } else {
                            $error = "Gagal memperbarui artikel.";
                        }
                    }
                }
            }
        } elseif (isset($_GET['action']) && $_GET['action'] === 'delete') {
            $id = $_GET['id'];
            $artikel_to_delete = $this->getArtikelById($id); // Gunakan getArtikelById dari model
            if ($artikel_to_delete) {
                $gambar_file_name = $artikel_to_delete['gambar'];
                if ($this->deleteArtikel($id)) {
                    // Hapus file gambar dari server
                    if ($gambar_file_name && file_exists($uploadDir . $gambar_file_name)) {
                        unlink($uploadDir . $gambar_file_name);
                    }
                    $success = "Artikel berhasil dihapus.";
                } else {
                    $error = "Gagal menghapus artikel dari database.";
                }
            } else {
                $error = "Artikel tidak ditemukan.";
            }
        }
        return ['success' => $success, 'error' => $error];
    }
}
?>